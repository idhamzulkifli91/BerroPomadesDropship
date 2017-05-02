<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Product;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

class ShopController extends Controller
{

    /**
     * @var Product
     */
    private $product;

    /**
     * @var OrderItem
     */
    private $orderItem;

    /**
     * @var Guard
     */
    private $auth;

    /**
     * @var Order
     */
    private $order;


    const VIEW_PATH = 'products.';


    public function __construct(Product $product,OrderItem $orderItem,Guard $auth,Order $order)
    {
        $this->product = $product;
        $this->orderItem = $orderItem;
        $this->auth = $auth;
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Shop / Cart';
        $products = $this->product->published()->paginate(static::PAGINATION_LIMIT);
        return view()->make(static::VIEW_PATH.'shop')->with(compact('title','products'));
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add($id)
    {
        $product = $this->product->find($id);

        $this->orderItem->create(['user_id' => $this->auth->user()->getAuthIdentifier(),'product_id' => $product->id]);
        Alert::info(sprintf('added %s to cart.',$product->product_name))->flash();
        return redirect()->back();
    }

    /**
     * @return $this
     */
    public function checkout()
    {

        $items = $this->orderItem->where('user_id',$this->auth->user()->getAuthIdentifier())->where('status',0);

        if($items->count() >= 1 ) {

            $title = 'Shopping / Checkout';
            $items = $this->orderItem->checkout($this->auth->user()->getAuthIdentifier())->get();

            return view()->make(static::VIEW_PATH . 'cart')->with(compact('title', 'items'));
        }

        Alert::error('You doesnt have any active cart order yet.')->flash();
        return redirect()->back();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function makePayment(Request $request)
    {
        $quantity = $request->get('quantity');
        $total = $request->get('total');
        $orderId = $request->get('order_id');

        $grandTotal = 0;


        $i = 0;
        $data = [

        ];

        foreach($quantity as $qty) {
            $data[$i]['order_id'] = $orderId[$i];
            $data[$i]['quantity'] = $qty;
            $data[$i]['total'] = $total[$i];
            $grandTotal += $total[$i];

            $i++;
        }

        $order = $this->order->create([
            'user_id' => $this->auth->user()->getAuthIdentifier(),
            'total' => $grandTotal,
            'customer_name' => $request->get('customer_name'),
            'customer_contact' => $request->get('customer_contact'),
            'customer_address' => $request->get('customer_address'),
            'customer_email' => $request->get('customer_email'),
        ]);

        foreach($data as $item ) {
            $this->orderItem->where('id',$item['order_id'])
                ->update(['quantity' => $item['quantity'],'total' => $item['total'],'order_id' => $order->id,'status' => 1]);
        }

        Alert::info('Your order has been submitted.')->flash();
        return redirect()->route('web.product.shop');

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->orderItem->destroy($id);
        Alert::info('Remove item.')->flash();
        return redirect()->back();
    }
}

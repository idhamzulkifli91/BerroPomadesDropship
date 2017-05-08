<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

class UserOrderController extends Controller
{
    private $guard;

    private $orderItem;

    private $order;

    const VIEW_PATH = 'orders.';

    public function __construct(Guard $guard,Order $order,OrderItem $orderItem)
    {
        $this->guard = $guard;
        $this->orderItem = $orderItem;
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Orders list';
        $counter = 1;
        $orders = $this->order->order($this->guard->user()->getAuthIdentifier())->paginate(static::PAGINATION_LIMIT);
        return view()->make(static::VIEW_PATH.'index')->with(compact('title','orders','counter'));
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
        $title = 'Order Detail';
        $order = $this->order->find($id);
        return view()->make(static::VIEW_PATH.'edit')->with(compact('order','title'));
    }


    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadEvidence($id,Request $request)
    {
        $order = $this->order->find($id);

        $this->validate($request,[
            'file' => 'mimes:png,jpeg,jpg'
        ]);

        $image = $request->file->store('images');
        $name = explode('/',$image)[1];
        $path = asset('/images').DIRECTORY_SEPARATOR.$name;
        $request->merge(['image' => $path]);
        Alert::info('You added Payment evidence.')->flash();

        $order->update(['payment_evidence' => $request->input('image')]);

        return redirect()->back();
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
        //
    }
}

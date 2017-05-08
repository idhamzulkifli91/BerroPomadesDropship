<?php

namespace App\Http\Controllers;

use App\Product;
use App\Role;
use App\UserDiscount;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

class DiscountController extends Controller
{

    private $discount;

    private $role;

    const VIEW_PATH = 'discounts.';

    public function __construct(UserDiscount $discount,Role $role)
    {
        $this->discount = $discount;
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Discount";
        $counter = 1;
        $discounts = $this->discount->paginate(static::PAGINATION_LIMIT);
        return view()->make(static::VIEW_PATH.'index')->with(compact('title','discounts','products','counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $title = "Discount";
        $roles = $this->role->all();
        $products = $product->published()->get();

        return view()->make(static::VIEW_PATH.'create')->with(compact('title','roles','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'product_id' => 'required',
            'role_id' => 'required',
            'discount' => 'required'
        ]);

        $this->discount->create($request->all());
        Alert::info('You added discount.')->flash();
        return redirect()->back();
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
        $this->discount->destroy($id);

        Alert::info('Discount deleted.')->flash();
        return redirect()->back();
    }
}

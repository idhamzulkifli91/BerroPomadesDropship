<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

class ProductController extends Controller
{
    private $product;

    const VIEW_PATH = 'products.';


    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Product Management";
        $counter = 1;
        $products = $this->product->paginate(static::PAGINATION_LIMIT);

        return view('products.index')->with(compact('products','title','counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Product / Create";
        return view('products.create')->with(compact('title'));
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
            'product_name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);
        $image = $request->file->store('images');
        $name = explode('/',$image)[1];
        $path = asset('/images').DIRECTORY_SEPARATOR.$name;

        $request->merge(['image' => $path]);

        Alert::info('You added New product.')->flash();
        $this->product->create($request->all());

        return redirect()->back()->with('_success','Product created.');
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
    public function edit(Product $product)
    {
        $title = "Product / Edit";
        return view()->make(static::VIEW_PATH.'edit')->with(compact('title','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'product_name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);
        $image = $request->file->store('images');
        $name = explode('/',$image)[1];
        $path = asset('/images').DIRECTORY_SEPARATOR.$name;

        $request->merge(['image' => $path]);

        $product->update($request->all());

        Alert::info('Product info updated.')->flash();
        return redirect()->back()->with('_success','Product Saved.');
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

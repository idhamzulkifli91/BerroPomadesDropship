<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Product;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

class InventoryController extends Controller
{
    private $inventory;
    const VIEW_PATH = 'inventory.';

    public function __construct(Inventory $inventory)
    {
        $this->inventory = $inventory;
    }

    /**
     * @return $this
     */
    public function index()
    {
        $title = "Inventory";
        $counter = 1;
        $stocks = $this->inventory->paginate(static::PAGINATION_LIMIT);
        return view()->make(static::VIEW_PATH.'index')->with(compact('title','stocks','counter'));
    }

    /**
     * @return $this
     */
    public function create()
    {
        $title = "Inventory / Create";
        $products = Product::all();
        return view()->make(static::VIEW_PATH.'create')->with(compact('title','products'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required',
            'stock_count' => 'required'
        ]);

        $this->inventory->create($request->except('_token'));
        Alert::info('You added new Stock.')->flash();
        return redirect()->back()->with('_success','Stock Create.');
    }

    public function topupItem($id)
    {
        $title = "Inventory / Topup";
        $stock = $this->inventory->find($id);
        return view()->make(static::VIEW_PATH.'topup-item')->with(compact('title','stock'));
    }

    public function topupItemUpdate($id,Request $request)
    {
        $this->validate($request,[
            'stock_count' => 'required'
        ]);

        $stock = $this->inventory->find($id);
        $stock->total += $request->input('stock_count');
        $stock->stock_count += $request->input('stock_count');
        $stock->save();

        Alert::info('You had added Stock')->flash();
        return redirect()->route('web.inventory.index');

    }


}

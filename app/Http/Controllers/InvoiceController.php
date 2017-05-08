<?php

namespace App\Http\Controllers;

use PDF;
use App\Order;

class InvoiceController extends Controller
{
    private $order;

    const VIEW_PATH = 'invoices.';

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function generateInvoice($id)
    {
        $order = $this->order->find($id);
        $html = view()->make(static::VIEW_PATH.'invoice')->with(compact('order'))->render();
        return PDF::loadHtml($html)->setPaper('a4')->setWarnings(false)->stream('download.pdf');
    }
}

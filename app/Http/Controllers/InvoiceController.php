<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeInvoiceRequest;
use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Invoice::with('customer')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeInvoiceRequest $request)
    {
        $invoice = Invoice::create([
            'customer_id' =>$request->customer,
            'number' =>$request->numero,
            'date' =>$request->date,
            'due_date' =>$request->due_date,
            'reference' =>$request->reference,
            'terms_and_conditions' =>$request->terms,
            'sub_total' =>$request->sub_total,
            'discount' =>$request->discount,
            'total' =>$request->total,
        ]);
        foreach($request->items as $item){
            Item::create([
                'invoice_id' => $invoice->id,
                'product_id' => $item['product_id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }
        return response([
            'message' => 'Your invoice has been created'
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Invoice::where('id',$id)->with(['customer','items.product'])->first();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}

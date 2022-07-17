<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Rma;
use App\Models\user\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.inventory.index');
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
        $validated = $request->validate([
            'rma_id' => 'required|integer|exists:rmas,id',
            'serial' => 'required|string',
            'model' => 'required|string',
            'issue' => 'required|string',
            'price' => 'required|numeric',
            'attachment' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'reason_id' => 'required|numeric',
        ]);

        if ($request->hasFile('attachment')) {
            // getting attatchment name
            $attachment = $request->file('attachment');
            $attachment_name = time() . '.' . $attachment->getClientOriginalExtension();
            $attachment->move(public_path('attachments'), $attachment_name);
        } else {
            $attachment_name = 'default.jpg';
        }

        $rma = Rma::find($validated['rma_id']);

        $validated['user_id'] = auth()->user()->user_id;
        $validated['customer_id'] = auth()->user()->id;
        $validated['attachment'] = $attachment_name;

        $inventory = Inventory::create($validated);

        return redirect()->back()->with('success', 'Inventory Added Successfully');
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
        //
    }
}

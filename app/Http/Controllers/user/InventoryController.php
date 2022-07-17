<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\Inventory;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\Rma;
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
        $Inventory = Inventory::all();
        return view('user.inventory.index', [
            'Inventorys' => $Inventory,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.inventory.create');
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

        $validated['user_id'] = auth()->user()->id;
        $validated['customer_id'] = $rma->customer->id;
        $validated['attachment'] = $attachment_name;

        $inventory = Inventory::create($validated);

        return redirect()->back()->with('success', 'Inventory Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        return view('user.inventory.show', [
            'Inventory' => $inventory,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view('user.inventory.edit', [
            'Inventory' => $inventory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        $task = Inventory::find($inventory->id);
        $task->delete();
        // return redirect()->route('pin.index')->with('message', 'Task Completed Successfully');
    }
}

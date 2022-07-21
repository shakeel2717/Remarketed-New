<?php

namespace App\Http\Controllers;

use App\Models\Rma;
use App\Models\user\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ImportDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'attachment' => 'required|file',
            'rma_id' => 'required|integer|exists:rmas,id',
        ]);

        $rma = Rma::findOrFail($validated['rma_id']);

        $inventories = array_map('str_getcsv', file($request->attachment));
        $a = false;

        foreach ($inventories as $inventory) {
            $serial = $inventory[0];
            $model = $inventory[1];
            $issue = $inventory[2];
            $reason_id = $inventory[3];
            $price = $inventory[4];
            $status = $inventory[6];
            if ($a) {
                // adding this into database
                $inventory = new Inventory();
                $inventory->user_id = auth()->user()->id;
                $inventory->rma_id = $validated['rma_id'];
                $inventory->customer_id = $rma->customer_id;
                $inventory->reason_id = $reason_id;
                $inventory->serial = $serial;
                $inventory->model = $model;
                $inventory->issue = $issue;
                $inventory->price = $price;
                $inventory->status = $status;
                $inventory->added_by = 'user';
                $inventory->save();
            }
            $a = true;
        }

        return redirect()->back()->with('success', 'Inventory imported successfully');
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

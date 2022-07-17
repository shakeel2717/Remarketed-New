<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\Refund;
use App\Http\Requests\StoreRefundRequest;
use App\Http\Requests\UpdateRefundRequest;
use App\Models\Rma;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Refund = Refund::all();
        return view('user.refund.index',[
            'Refunds' => $Refund,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.refund.create');
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
            'amount' => 'required|numeric',
            'method' => 'required|string',
            'txid' => 'required|string',
            'note' => 'nullable|string',
            'attachment' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt,csv,zip,rar|max:10048',
        ]);

        if ($request->hasFile('attachment')) {
            // getting attatchment name
            $attachment = $request->file('attachment');
            $attachment_name = time() . '.' . $attachment->getClientOriginalExtension();
            $attachment->move(public_path('attachments/refunds'), $attachment_name);
        } else {
            $attachment_name = null;
        }

        $rma = Rma::find($validated['rma_id']);

        $validated['attachment'] = $attachment_name;

        auth()->user()->refunds()->create($validated + [
            'customer_id' => $rma->customer->id
        ]);

        return redirect()->back()->with('success', 'Refund Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function show(Refund $refund)
    {
        return view('user.refund.show',[
            'Refund' => $refund,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function edit(Refund $refund)
    {
        return view('user.refund.edit',[
            'Refund' => $refund,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refund $refund)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refund $refund)
    {
        $task = Refund::find($refund->id);
        $task->delete();
        // return redirect()->route('pin.index')->with('message', 'Task Completed Successfully');
    }
}

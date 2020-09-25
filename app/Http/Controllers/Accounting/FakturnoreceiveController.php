<?php

namespace App\Http\Controllers\Accounting;

use App\Faktur;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;

class FakturnoreceiveController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounting.faktur.noreceive.index');
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
     * @param  \App\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function show(Faktur $faktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $faktur = Faktur::findOrFail($id);

            return view('accounting.faktur.noreceive.edit', compact('faktur'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('accounting.fakturnoreceive.index')->with($this->alertNotFound());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $faktur = Faktur::findOrFail($id);

            $this->validate($request, [
                'receive_date' => ['required'],
            ]);

            $faktur->update([
                'receive_date' => $request->receive_date,
                'receive_updated_by' => auth()->user()->name
            ]);

            return redirect()->route('accounting.fakturnoreceive.index')->with($this->alertUpdated());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('accounting.fakturnoreceive.index')->with($this->alertNotFound());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faktur $faktur)
    {
        //
    }
}

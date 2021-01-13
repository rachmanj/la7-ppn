<?php

namespace App\Http\Controllers\Accounting;

use App\Faktur;
use App\Http\Controllers\Controller;
use App\Imports\FakturImport;
use App\Exports\FaktursExport;
use App\Exports\FaktursreceiveExport;
use App\Exports\FaktursnotreceiveExport;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;
use Maatwebsite\Excel\Facades\Excel;

class FakturController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounting.fakturs.all.index');
    }

    public function receive_index()
    {
        return view('accounting.fakturs.receive.index');
    }


    public function create()
    {
        $suppliers = Supplier::orderBy('name', 'asc')->get();

        return view('accounting.fakturs.receive.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'faktur_no' => ['required', 'unique:fakturs'],
            'faktur_date' => ['required'],
            'supplier_code' => ['required'],
            'amount' => ['required'],
            'receive_date' => ['required'],
        ]);

        Faktur::create([
            'faktur_no' => $request->faktur_no,
            'faktur_date' => $request->faktur_date,
            'vendor_code' => $request->supplier_code,
            'amount' => $request->amount,
            'receive_date' => $request->receive_date,
            'created_by'    => auth()->user()->name
        ]);

        return redirect()->route('accounting.fakturs.receive_index')->with($this->alertCreated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $faktur = Faktur::findOrFail($id);
            $supplier = Supplier::where('code', $faktur->vendor_code)->first();

            return view('accounting.fakturs.all.show', compact('faktur', 'supplier'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('accounting.fakturs.index')->with($this->alertNotFound());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $faktur = Faktur::findOrFail($id);
            $supplier = Supplier::where('code', $faktur->vendor_code)->first();

            return view('accounting.fakturs.receive.edit', compact('faktur', 'supplier'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('accounting.fakturs.receive_index')->with($this->alertNotFound());
        }
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
        try {
            $faktur = Faktur::findOrFail($id);

            $this->validate($request, [
                'faktur_no'     => ['required'],
                'receive_date'  => ['required'],
            ]);

            $faktur->update([
                'faktur_no'         => $request->faktur_no,
                'receive_date'      => $request->receive_date,
                'receive_updated_by' => auth()->user()->name
            ]);

            return redirect()->route('accounting.fakturs.receive_index')->with($this->alertUpdated());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('accounting.fakturs.receive_index')->with($this->alertNotFound());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $faktur = Faktur::findOrFail($id);

            $faktur->delete($id);

            return redirect()->route('accounting.fakturs.belumsap_index')->with($this->alertDeleted());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('accounting.fakturs.belumsap_index')->with($this->alertNotFound());
        }
    }

    public function duplicates_index()
    {
        return view('accounting.fakturs.duplicates.index');
    }

    public function efaktur_index()
    {
        return view('accounting.fakturs.efaktur.index');
    }

    public function efaktur_edit($id)
    {
        try {
            $faktur = Faktur::findOrFail($id);
            $supplier = Supplier::where('code', $faktur->vendor_code)->first();

            return view('accounting.fakturs.efaktur.edit', compact('faktur', 'supplier'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('accounting.fakturs.efaktur_index')->with($this->alertNotFound());
        }
    }

    public function efaktur_update(Request $request, $id)
    {
        try {
            $faktur = Faktur::findOrFail($id);

            $this->validate($request, [
                'efaktur_date'  => ['required'],
            ]);

            $faktur->update([
                'receive_date'      => $request->efaktur_date,
                'efaktur_updatedby' => auth()->user()->name
            ]);

            return redirect()->route('accounting.fakturs.efaktur_index')->with($this->alertUpdated());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('accounting.fakturs.efaktur_index')->with($this->alertNotFound());
        }
    }

    public function belumsap_index()
    {
        return view('accounting.fakturs.belumsap.index');
    }

    public function receive_already_index()
    {
        return view('accounting.fakturs.all.received');
    }

    public function receive_not_index()
    {
        return view('accounting.fakturs.all.received_not');
    }

    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_upload', $nama_file);

        // import data
        Excel::import(new FakturImport, public_path('/file_upload/' . $nama_file));

        return redirect()->route('accounting.fakturs.index')->with($this->alertImport());
    }

    public function export_excel()
    {
        return Excel::download(new FaktursExport(), 'fakturs.xlsx');
    }

    public function faktur_receive_export_excel()
    {
        return Excel::download(new FaktursreceiveExport(), 'fakturs_receive.xlsx');
    }

    public function faktur_notreceive_export_excel()
    {
        return Excel::download(new FaktursnotreceiveExport(), 'fakturs_not_receive.xlsx');
    }
}

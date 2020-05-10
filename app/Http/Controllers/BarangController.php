<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('pages.admin.index',['collection'=> $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = ['barang 1','barang2','barang 3'];
        // dd($jenis); 
        return view('pages.admin.formCreate',compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_invoice' => 'required',
            'nama_barang' =>'required',
            'jenis_barang' =>'required',
            'berat_barang' => 'required',
            'warna_barang' => 'required',
            'gambar_barang' => 'required|file|image'
        ]);
        $file = $request->gambar_barang;
        $namaFoto = $request->no_invoice."_".$file->getClientOriginalName();
        $FotoLocation = 'public/gambar';
        $file->storeAs($FotoLocation,$namaFoto);

        Barang::create([
            'no_invoice' => $request->no_invoice,
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'berat_barang' => $request->berat_barang,
            'warna_barang' => $request->warna_barang,
            'gambar_barang' => $namaFoto 
        ]);
        $request->session()->flash('tambah',"Data {$request->nama} Berhasil Disimpan");
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}

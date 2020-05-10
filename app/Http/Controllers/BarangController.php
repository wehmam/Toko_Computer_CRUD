<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('pages.admin.barang.index',['collection'=> $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = ['Pc','Laptop','Accecories Laptop','Memory External','Handphone'];
        return view('pages.admin.barang.formCreate',compact('jenis'));
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
            'no_invoice' => 'required|unique:barangs|max:15',
            'nama_barang' =>'required|min:3',
            'jenis_barang' =>'required',
            'berat_barang' => 'required|max:10',
            'warna_barang' => 'required',
            'gambar_barang' => 'required|file|image'
        ]);
        $namafile = $request->gambar_barang->hashName();
        $file = $request->gambar_barang;
        $FotoLocation = 'public/gambar';
        $file->storeAs($FotoLocation,$namafile);

        Barang::create([
            'no_invoice' => $request->no_invoice,
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'berat_barang' => $request->berat_barang,
            'warna_barang' => $request->warna_barang,
            'gambar_barang' => $namafile 
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
        $barang->find($barang->barang_id)::all();

        $jenis = ['Pc','Laptop','Accecories Laptop','Memory External','Handphone'];
        return view('pages.admin.barang.formEdit',compact('barang','jenis'));
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
        $request->validate([
            'no_invoice' => 'required|max:15',
            'nama_barang' =>'required|min:3',
            'jenis_barang' =>'required',
            'berat_barang' => 'required|max:10',
            'warna_barang' => 'required',
            'gambar_barang' => 'image|file'
        ]);

        $barang->find($barang->barang_id)->update([
            'no_invoice' => $request->no_invoice,
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'berat_barang' => $request->berat_barang,
            'warna_barang' => $request->warna_barang,
            'gambar_barang' => $request->gambar_barang ? $request->gambar_barang->hashName() : $barang->gambar_barang
        ]);
        $file = $request->gambar_barang;

        $FotoLocation = 'public/gambar';
        if($file){
            $file->storeAs($FotoLocation,$request->gambar_barang->hashName());
        }

        $request->session()->flash('edit',"Data {$barang->no_invoice} Berhasil diedit");
        return  redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->find($barang->barang_id)->delete();

        Storage::delete('public/gambar/'.$barang->gambar_barang);
        return redirect()->route('barang.index')->with(['hapus' => "Data {$barang['nama_barang']} Berhasil Dihapus!"]);
    }
}



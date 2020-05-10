<?php

namespace App\Http\Controllers;

use App\NamaToko;
use Illuminate\Http\Request;

class NamaTokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toko = NamaToko::all();
        return view('pages.admin.toko.index',['collection'=> $toko]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.toko.formCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validate = $request->validate([
            'nama_toko' => 'required|min:3',
            'pemilik_toko' => 'required|min:3|string',
            'no_izin_usaha' => 'required|max:15',
            'alamat' => 'required'
        ]);
        NamaToko::create($validate);
        $request->session()->flash('tambah',"Data {$validate['nama_toko']} Berhasil Ditambahkan");
        return redirect()->route('toko.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NamaToko  $namaToko
     * @return \Illuminate\Http\Response
     */
    public function show(NamaToko $namaToko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NamaToko  $namaToko
     * @return \Illuminate\Http\Response
     */
    public function edit(NamaToko $namaToko)
    {
        $namaToko->find($namaToko->id)::all();
        return view('pages.admin.toko.formEdit',compact('namaToko'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NamaToko  $namaToko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NamaToko $namaToko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NamaToko  $namaToko
     * @return \Illuminate\Http\Response
     */
    public function destroy(NamaToko $namaToko)
    {
        //
    }
}

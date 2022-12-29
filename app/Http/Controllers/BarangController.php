<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use Illuminate\Support\Str;
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
        return view('admin.barang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image')->store('image');
        $image = $request->image;
        $slug = Str::slug($image->getClientOriginalName());
        $new_image = time() .'_'. $slug;
        $image->move('uploads/product/', $new_image);

        $product = new Barangs();
        $product->nama_barang = $request->nama_barang;
        $product->jenis_barang = $request->jenis_barang;
        $product->quantity = $request->quantity;
        $product->penjual = $request->penjual;
        $product->deskripsi = $request->deskripsi;
        $product->image= 'uploads/product/'.$new_image;
        $product->harga = $request->harga;
        $product->save();

        return to_route('admin.home')->with('Succes','data berhasil ditambah');
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
        $barang = Barangs::find($id);
        return view('admin.barang.edit', compact('barang'));
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
        $image = $request->file('image')->store('image');
        $image = $request->image;
        $slug = Str::slug($image->getClientOriginalName());
        $new_image = time() .'_'. $slug;
        $image->move('uploads/product/', $new_image);

        $product = Barangs::find($id);
        $product->nama_barang = $request->nama_barang;
        $product->jenis_barang = $request->jenis_barang;
        $product->quantity = $request->quantity;
        $product->penjual = $request->penjual;
        $product->deskripsi = $request->deskripsi;
        $product->image= 'uploads/product/'.$new_image;
        $product->harga = $request->harga;
        $product->update();
        return to_route('admin.home')->with('Succes','data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barangs::findOrFail($id);
        if ($barang->delete()) {
            return back()->with('success', 'Item berhasil dihapus');
        } else {
            return back()->with('error', 'Item gagal dihapus');
        }
    }

    public function sayur()
    {
        $barang = Barangs::where('jenis_barang','sayur-sayuran')->get();
        return view('product.kategoriSayur', compact('barang'));
    }

    public function buah()
    {
        $barang = Barangs::where('jenis_barang','buah-buahan')->get();
        return view('product.kategoriBuah', compact('barang'));
    }

    public function lahan()
    {
        $barang = Barangs::where('jenis_barang','lahan')->get();
        return view('product.kategoriLahan', compact('barang'));
    }
}

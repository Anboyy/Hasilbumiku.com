<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barangs;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class SayurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sayur = Barangs::where('jenis_barang','sayur-sayuran')->get();
        $response = [
            'message' => 'Data Sayuran',
            'data' => $sayur,
        ];
        $data = response()->json($response, HttpFoundationResponse::HTTP_OK);
        // $data = json_decode($data);
        // return view('product.kategoriSayur', compact('data'));
        return $response;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

    public function sayur()
    {
        $sayur = Barangs::where('jenis_barang','sayur-sayuran')->get();
        $response = [
            'message' => 'Data Sayuran',
            'data' => $sayur,
        ];
        $data = response()->json($response, HttpFoundationResponse::HTTP_OK);
        // $data = json_decode($data);
        // return view('product.kategoriSayur', compact('data'));
        // return view('product.api.index', compact('data'));
        return $data;
    }

    public function buah()
    {
        $buah = Barangs::where('jenis_barang','buah-buahan')->get();
        $response = [
            'message' => 'Data Buah',
            'data' => $buah,
        ];
        $data = response()->json($response, HttpFoundationResponse::HTTP_OK);
        // $data = json_decode($data);
        return view('product.api.index', compact('response'));
        // return $response;
    }
}

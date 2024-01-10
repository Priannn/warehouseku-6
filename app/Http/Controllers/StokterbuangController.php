<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use App\Models\Stokterbuang;
use Illuminate\Http\Request;

class StokterbuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {
        $post=Stokterbuang::all();
        $produks=Stock::all();
        $paginated=User::find($userId)->stokterbuang()->paginate(5);
        $user=auth()->user();
        return view('stokterbuang.index',compact('post','produks','user','paginated'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post=new Stokterbuang;
        $post->tanggal=$request->tanggal;
        $post->user_id=auth()->user()->id;
        $post->stock_id=$request->stock_id;
        $post->jumlah=$request->jumlah;
        $post->jumlahkerugian=$request->jumlahkerugian;

        $post->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post=Stokterbuang::find($id);
        $post->tanggal=$request->tanggal;
        $post->kodeproduk=$request->kodeproduk;
        $post->produk_id=$request->produk_id;
        $post->jumlah=$request->jumlah;
        $post->jumlahkerugian=$request->jumlahkerugian;

        $post->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post= Stokterbuang::find($id);

        if($post){
            $post->delete();
            return back()->with('success','Data berhasil dihapus');
        }else{
            return back()->with('error','Data gagal dihapus');
        }
    }
}

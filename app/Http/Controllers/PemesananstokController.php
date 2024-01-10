<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\Pemesananstok;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PemesananstokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {
        $paginatedPemesanan=User::find($userId)->pemesananstok()->paginate(5);
        $stocks = Stock::all();
        $user=auth()->user();
        
        return view('pemesananstok.index', compact( 'stocks','user','paginatedPemesanan'));
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
        $id = IdGenerator::generate(['table' => 'pemesanan', 'length' => 10, 'prefix' => date('ymd')]);


        $photo = null;
        if ($request->hasFile('photo')){
            $photo = $request->file('photo')->store('photos');
        }
        $post = new Pemesananstok;
        $photo = $request->file('photo')->store('photos');
        $post->id = $id;
        $post->user_id = auth()->user()->id;
        $post->stock_id = $request->stock_id;
        $post->tanggal = $request->tanggal;
        $post->jumlah = $request->jumlah;
        $post->photo = $photo;

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
        $post = Pemesananstok::find($id);
        $post->jumlah = $request->jumlah;

        $post->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Pemesananstok::find($id);
        if($post){
            $post->delete();
            return back()->with('success','Data berhasil dihapus');
        }else{
            return back()->with('error','Data gagal dihapus');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {
        $suppliers = Supplier::all();
        $paginatedStock = User::find($userId)->stock()->paginate(5);
        $user = auth()->user();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('stock.index', compact('suppliers', 'paginatedStock', 'user'));
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
        $pic = $request->gambar;
        $pic_name = $pic->getClientOriginalName();
        $id = IdGenerator::generate(['table' => 'stocks', 'length' => 6, 'prefix' => '023']);

        $post = new Stock;
        $post->user_id = auth()->user()->id;
        $post->id = $id;
        $post->produk = $request->produk;
        $post->tanggal_masuk = $request->tanggal_masuk;
        $post->tanggal_keluar = $request->tanggal_keluar;
        $post->supplier_id = $request->supplier_id;
        $post->jumlah = $request->jumlah;
        $post->satuan = $request->satuan;
        $post->harga = $request->harga;
        $post->gambar = $pic_name;

        if ($post) {
            $pic->move(public_path() . '/gambarproduk', $pic_name);
            $post->save();
            return back()->with('success', 'Produk Berhasil Ditambahkan!');
        } else {
            return back()->with('error', 'Produk gagal ditambahkan!');
        }
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
        $edit = Stock::findOrFail($id);

        $post = [
            'produk' => $request->input('produk'),
            'tanggal_masuk' => $request->input('tanggal_masuk'),
            'tanggal_keluar' => $request->input('tanggal_keluar'),
            'jumlah' => $request->input('jumlah'),
            'satuan' => $request->input('satuan'),
            'harga' => $request->input('harga'),
        ];
        if ($edit) {
            $edit->update($post);
            return back()->with('success', 'Berhasil mengedit produk');
        } else {
            return back()->with('error', 'Gagal mengedit produk!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Stock::find($id);
        if ($post) {
            $post->delete();
            return back()->with('success', 'Berhasil menghapus produk!');
        } else {

            return back()->with('error', 'Gagal menghapus produk!');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\Fakturpembelian;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class FakturpembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {
        $post = Fakturpembelian::all();
        $stocks = Stock::all();
        $paginated=User::find($userId)->fakturpembelian()->paginate(5);
        $user=auth()->user();
        return view('fakturpembelian.index', compact('post', 'stocks','user','paginated'));
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
        $id = IdGenerator::generate(['table' => 'fakturpembelian', 'length' => 8, 'prefix' => '1123']);

        $post = new Fakturpembelian;
        $post->id = $id;
        $post->user_id=auth()->user()->id;
        $post->tanggal = $request->tanggal;
        $post->pemesananstok_id = $request->pemesananstok_id;
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
        $post = Fakturpembelian::find($id);
        $post->status = $request->status;
        $post->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Fakturpembelian::find($id);
        if($post){
            $post->delete();
            return back()->with('success','Data berhasil dihapus');
        }else{
            return back()->with('error','Data gagal dihapus');
        }
    }
}

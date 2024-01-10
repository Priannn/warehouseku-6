<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\Pemesananstok;
use App\Models\Fakturpembayaran;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class FakturpembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {
        $user=auth()->user();
        $paginated=User::find($userId)->fakturpembayaran()->paginate(5);
        return view('fakturpembayaran.index',compact('user','paginated'));
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
        $id = IdGenerator::generate(['table' => 'fakturpembayaran', 'length' => 8, 'prefix' => '2223']);
        $post=new Fakturpembayaran;
        $post->id=$id;
        $post->user_id=auth()->user()->id;
        $post->fakturpembelian_id=$request->fakturpembelian_id;
        $post->pembayaran=$request->pembayaran;
        $post->status_pembayaran=$request->status_pembayaran;
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
        $post=Fakturpembayaran::find($id);
        $post->status=$request->status;

        $post->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Fakturpembayaran::find($id);
        if($post){
            $post->delete();
            return back()->with('success','Data berhasil dihapus');
        }else{
            return back()->with('error','Data gagal dihapus');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {
        $post=Supplier::paginate(6);
        $paginated = User::find($userId)->supplier()->paginate(4);
        $user=auth()->user();
        return view('supplier.index',compact('post','user','paginated'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = IdGenerator::generate(['table' => 'suppliers', 'length' => 6, 'prefix' => '0297']);
        $post=new Supplier;
        $post->id=$id;
        $post->user_id=auth()->user()->id;
        $post->supplier=$request->supplier;
        $post->email=$request->email;
        $post->no_telp=$request->no_telp;
        $post->alamat=$request->alamat;

        if($post){
            $post->save();
            return back()->with('message','Supplier berhasil ditambahkan');
        }else{
            return back()->with('error','Menambahkan data gagal!');
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
        $post=Supplier::findorfail($id);
        $post->id=$request->id;
        $post->supplier=$request->supplier;
        $post->email=$request->email;
        $post->no_telp=$request->no_telp;
        $post->alamat=$request->alamat;

        if($post){
            $post->update();
            return back()->with('success','Berhasil mengedit data');
        }else{
            return back()->with('error','Gagal menghapus data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Supplier::find($id);

        if($post){
            $post->delete();
            return back()->with('success','Data berhasil dihapus');
        }else{
            return back()->with('error','Data gagal dihapus');
        }
    }
}

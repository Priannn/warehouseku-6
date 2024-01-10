<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post=User::all();
        return view('admin.index',compact('post'));
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
        $post=$request->validate([
            'name'=>'required',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required',
            'namausaha'=>'required',
            'lokasi'=>'required',
            'jenisusaha'=>'required',
            'lamaoperasi'=>'required',
        ]);
        $post['password']=bcrypt($post['password']);
        User::create($post);
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
        

        $post=User::findorfail($id);
        $post->name=$request->name;
        $post->email=$request->email;
        $post->namausaha=$request->namausaha;   
        $post->jenisusaha=$request->jenisusaha;
        $post->lokasi=$request->lokasi;
        $post->lamaoperasi=$request->lamaoperasi;

        $post->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=User::find($id);
        $post->delete();
        return back();
    }
}

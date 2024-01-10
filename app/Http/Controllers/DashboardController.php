<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use App\Models\Stokterbuang;
use Illuminate\Http\Request;
use App\Models\Pemesananstok;
use App\Models\Fakturpembayaran;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {
        $paginatedPembayaran=User::find($userId)->fakturpembayaran()->paginate(5);
        $paginatedPemesanan=User::find($userId)->pemesananstok()->paginate(5);
        $user=auth()->user();
        return view('dashboard.index',compact('paginatedPembayaran','paginatedPemesanan','user'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Models;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stokterbuang extends Model
{
    protected $table="stokterbuang";
    protected $fiilable=['kodeproduk','stocks_id','tanggal','jumlah'];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Pemesananstok;
use App\Models\Fakturpembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fakturpembelian extends Model
{
    protected $table="fakturpembelian";
    protected $fillable=['id'];
    public $incrementing=false;

    public function product()
    {
        return $this->belongsTo(Stock::class);
    }
    public function fakturpembayaran()
    {
        return $this->hasMany(Fakturpembayaran::class);
    }
    public function pemesananstok()
    {
        return $this->belongsTo(Pemesananstok::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pembayaran()
    {
        return $this->fakturpembayaran()->exists();
    }

}

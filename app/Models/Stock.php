<?php

namespace App\Models;

use App\Models\Supplier;
use App\Models\Stokterbuang;
use App\Models\Pemesananstok;
use App\Models\Fakturpembelian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    protected $table="stocks";
    protected $fillable=['id','produk','tanggalmasuk','tanggalkeluar','supplier_id','jumlah','satuan','gambar'];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function pemesanan(){
        return $this->hasMany(Pemesananstok::class,'stock_id');
    }
    public function stokterbuang(){
        return $this->hasMany(Stokterbuang::class);
    }
    public function fakturpembelian(){
        return $this->hasMany(Fakturpembelian::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

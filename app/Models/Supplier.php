<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table="suppliers";

    public function stock(){
        return $this->hasMany(Stock::class);
    }
    public function pemesanan(){
        return $this->hasMany(Pemesananstok::class);
    }
    public function faktur(){
        return $this->hasMany(Fakturpembelian::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

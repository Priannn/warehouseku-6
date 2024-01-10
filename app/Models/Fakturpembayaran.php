<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakturpembayaran extends Model
{
    protected $table="fakturpembayaran";

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function fakturpembelian()
    {
        return $this->belongsTo(Fakturpembelian::class,);
    }
    public function pemesananstok()
    {
        return $this->belongsTo(Pemesananstok::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

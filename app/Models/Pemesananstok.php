<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Supplier;
use App\Models\Fakturpembelian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesananstok extends Model
{
    protected $table = "pemesanan";
    protected $fillable = ['stock_id', 'tanggal', 'status', 'total'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'id');
    }
    public function stock()
    {
        return $this->belongsTo(Stock::class,'id');
    }
    public function faktur()
    {
        return $this->hasMany(Fakturpembelian::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $incrementing = false;


    public function pembayaran()
    {
        return $this->faktur()->exists();
    }
}

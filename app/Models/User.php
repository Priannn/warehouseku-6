<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nama_usaha',
        'jenis_usaha',
        'lokasi_usaha',
        'lama_operasi',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function stock(){
        $post= $this->hasMany(Stock::class)->latest();
        if(request('search')){
            $post->where('produk','like','%' . request('search') . '%');
        }
        return $post;
    }
    public function supplier(){
        $post= $this->hasMany(Supplier::class)->latest();
        if(request('search')){
            $post->where('supplier','like','%' . request('search') . '%');
        }
        return $post;
    }
    public function stokterbuang(){
        $post= $this->hasMany(Stokterbuang::class)->latest();
        if(request('search')){
            $post->where('id','like','%' . request('search') . '%');
        }
        return $post;
    }
    public function pemesananstok(){
        $post= $this->hasMany(Pemesananstok::class)->latest();
        if(request('search')){
            $post->where('id','like','%' . request('search') . '%')
            ->where('tanggal','like','%' . request('search') . '%');
        }
        return $post;
    }
    public function fakturpembelian(){
        $post= $this->hasMany(Fakturpembelian::class)->latest();
        if(request('search')){
            $post->where('id','like','%' . request('search') . '%');
        }
        return $post;
    }
    public function fakturpembayaran(){
        $post= $this->hasMany(Fakturpembayaran::class)->latest();
        if(request('search')){
            $post->where('id','like','%' . request('search') . '%');
        }
        return $post;
    }
}

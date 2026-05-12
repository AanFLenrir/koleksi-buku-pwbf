<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Buku;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';
    public $timestamps = false;

    protected $fillable = ['nama_kategori'];

    public function buku()
    {
        return $this->hasMany(
            Buku::class,
            'idkategori',   // FK di tabel buku
            'idkategori'     // PK di tabel kategori
        );
=======

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';
    protected $guarded = ['idkategori'];

    public function Bukus() {
        return $this->hasMany(Buku::class, 'idkategori');
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8
    }
}

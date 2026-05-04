<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Kategori;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'idbuku';
    public $timestamps = false;

    protected $fillable = [
        'kode',
        'judul',
        'pengarang',
        'idkategori'
    ];

    public function kategori()
    {
        return $this->belongsTo(
            Kategori::class,
            'idkategori',   
            'idkategori'    
        );
=======

class Buku extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'idbuku';
    protected $guarded = ['id'];
    
    public function KategoriBuku() {
        return $this->belongsTo(Kategori::class, 'idkategori');
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8
    }
}

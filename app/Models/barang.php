<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    public $incrementing = false; // karena primary key string
    protected $keyType = 'string';
    protected $fillable = ['nama', 'harga'];

    protected static function booted()
    {
        static::creating(function ($barang) {
            $date = date('ymd'); // format YYMMDD
            $count = self::whereDate('created_at', now()->toDateString())->count() + 1;
            $number = str_pad($count, 2, '0'); // 2 digit
            $barang->id_barang = "BR-{$date}-{$number}";
        });
    }
}
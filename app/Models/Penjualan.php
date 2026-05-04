<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    
    protected $fillable = [
        'total',
    ];
    
    protected $casts = [
        'total' => 'decimal:2',
    ];
    
    public function PenjualanDetail()
    {
        return $this->hasMany(PenjualanDetail::class, 'id_penjualan', 'id_penjualan');
    }
}
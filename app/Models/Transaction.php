<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function scopeFilter($query, $search)
    {
        return  $query->where('tanggal_in', 'like', '%' . $search . '%')
            ->orWhere('status_ambil', 'like', '%' . $search . '%');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}

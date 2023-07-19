<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function scopeFilter($query, $search)
    {
        return  $query->where('nama', 'like', '%' . $search . '%')
            ->orWhere('telepon', 'like', '%' . $search . '%')->orWhere('alamat', 'like', '%' . $search . '%');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

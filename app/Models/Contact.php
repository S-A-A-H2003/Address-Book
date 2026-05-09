<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasUuids;
    protected $fillable = ['name'];

    public function numbers()
    {
        return $this->hasMany(Number::class , 'contact_id');
    }

    public function scopeSearch(Builder $query, $search)
    {
        if (!$search) return $query;
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'LIKE', '%' . $search . '%')
              ->orWhereHas('numbers', function ($q) use ($search) {
                  $q->where('phone_number', $search);
              });
        });
    }
}

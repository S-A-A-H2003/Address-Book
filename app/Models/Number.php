<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasUuids;
    protected $fillable = ['contact_id', 'phone_number', 'type'];

    public function contact()
    {
        return $this->belongsTo(Contact::class , 'contact_id');
    }
}

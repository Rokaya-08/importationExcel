<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['organisme_id', 'first_name', 'last_name', 'email', 'phone', 'fix_phone'];

    public function organisme()
    {
        return $this->belongsTo(Organisme::class);
    }
}

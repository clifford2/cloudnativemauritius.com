<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CFP extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'name',
        'phone',
        'email',
        'approved',
    ];
}

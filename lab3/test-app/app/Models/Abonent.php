<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonent extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable =[
        'phone_number',
        'address',
        'owner',
        'account',
        'sum'
    ];

    protected $table = 'abonent';
}

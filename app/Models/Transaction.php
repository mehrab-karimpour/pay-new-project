<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable=[
        'order_id',
        'order_id',
        'res_code',
        'ref_id',
        'sale_ref_id',
        'status',
        'msg',
    ];
}

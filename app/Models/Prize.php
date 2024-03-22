<?php

namespace App\Models;

use Illuminate\Support\Facades\Redis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prize extends Model
{
    use HasFactory;

    protected $fillable = ['name','type'];
}

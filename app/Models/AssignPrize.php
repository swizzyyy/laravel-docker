<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignPrize extends Model
{
    use HasFactory;

    protected $fillable = ['rank_category_id','amount','odds_of_winning'];
}

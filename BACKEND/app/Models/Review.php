<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Review extends Model
{
        protected $fillable = [
        'name', 'review', 'avatar', 'grade'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}

<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BecomeSitterCityArea extends Model
{
    public $timestamps = false;
    protected $table = 'sitter_city_area_handbook';
    protected $primaryKey = 'city_area';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'city_area'
    ];
    protected $visible = [ 'city_area' ];
}

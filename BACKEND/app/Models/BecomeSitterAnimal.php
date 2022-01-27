<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BecomeSitterAnimal extends Model
{
    public $timestamps = false;
    protected $table = 'sitter_animal_handbook';
    protected $primaryKey = 'animal';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'animal'
    ];
    protected $visible = [ 'animal' ];
}

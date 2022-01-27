<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BecomeSitter extends Model
{
    protected $table = 'sitters';
    protected $fillable = [

        'name', 'lastName','text',
        //'AnimalTags','AnimalTagsAttribute',
        //'animals', 'city_areas',
        'number', 'email', 'socialMedia', 'agreement'
    ];
    //protected $visible = ['AnimalTagsAttribute'];
    //protected $attributes = [ 'AnimalTags' ];
    protected $hidden = [
        'created_at', 'updated_at','animals'
    ];
    //public function getAnimalsAttribute()
    //{
    //    return $this->belongsToMany(BecomeSitterAnimal::class,'become_sitter_animals','become_sitter_id','animal')->get();//([ 'become_sitter_animal_handbook.animal' ])->flatMap
    //}
    public function animals()
    {
        return $this->belongsToMany(BecomeSitterAnimal::class,'sitter_animals','sitter_id','animal');
//        return $this->belongsToMany(BecomeSitterAnimal::class,'become_sitter_animals','become_sitter_id','animal');
    }

    public function getAnimalTagsAttribute()
    {
        return $this->animals()->pluck('sitter_animal_handbook.animal')->values();
    }
    public function cityAreas()
    {
        return $this->belongsToMany(BecomeSitterCityArea::class,'sitter_city_areas','sitter_id','city_area');
    }

    public function getCityAreaTagsAttribute()
    {
        return $this->cityAreas()->pluck('sitter_city_area_handbook.city_area')->values();
    }
    protected $appends = [ 'AnimalTags', 'CityAreaTags' ];
}
/*
class BecomeSitterAnimal extends Model
{
    protected $table = 'become_sitter_animal_handbook';
    protected $primaryKey = 'animal';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'animal'
    ];
    protected $visible = [ 'animal' ];
}
*/

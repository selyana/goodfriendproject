<?php
namespace App\Http\Controllers\API;
use App\Models\BecomeSitterAnimal;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\BecomeSitter;
use Illuminate\Support\Facades\DB;
use Validator;

class SittersSearchApiController extends BaseController
{
    public function index()
    {
        $data = [
            'sitters' => DB::table('sitters')->get()->map(function ($item)
            {
                $item->city_areas = DB::table('sitter_city_areas')->where('sitter_id',$item->id)->pluck('city_area')->toArray();
                $item->sitter_animals = DB::table('sitter_animals')->where('sitter_id',$item->id)->pluck('animal')->toArray();
                $item->rating = floatval(DB::table('sitter_reviews')->where('sitter_id',$item->id)->average('rating'));
                //$item->city_areas = DB::table('sitter_city_areas')->where('sitter_id',$item->id)->pluck('city_area')->toArray();
                //$item['city_areas'] = DB::table('sitter_city_areas')->where('sitter_id',$item->id)->get('city_area')->toArray();
                return $item;
                //return
                //[
                //    'sitter' => $item,
                //    'city_areas' =>DB::table('sitter_city_areas')->where('sitter_id',$item->id)->get('city_area')->toArray()
                //];
            })->toArray()
        ];
      return $this->sendResponse($data, 'Retrieved successfully.');
    }

    public function sitter(int $id)
    {
        $data = [
            'sitter' => DB::table('sitters')->where('id', $id)->get()->map(function ($item) {
                $item->city_areas = DB::table('sitter_city_areas')->where('sitter_id', $item->id)->pluck('city_area')->toArray();
                $item->sitter_animals = DB::table('sitter_animals')->where('sitter_id', $item->id)->pluck('animal')->toArray();
                $item->reviews = DB::table('sitter_reviews')->where('sitter_id', $item->id)->get()->toArray();
                $item->rating = floatval(DB::table('sitter_reviews')->where('sitter_id', $item->id)->average('rating'));
                //$item->city_areas = DB::table('sitter_city_areas')->where('sitter_id',$item->id)->pluck('city_area')->toArray();
                //$item['city_areas'] = DB::table('sitter_city_areas')->where('sitter_id',$item->id)->get('city_area')->toArray();
                return $item;
                //return
                //[
                //    'sitter' => $item,
                //    'city_areas' =>DB::table('sitter_city_areas')->where('sitter_id',$item->id)->get('city_area')->toArray()
                //];
            })->first()
        ];
        return $this->sendResponse($data, 'Retrieved successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        //return $this->sendResponse($BecomeSitter->toArray(), 'Reviews retrieved successfully.');
//
//        $input = [
//            'name' => '111',
//        'last_name' => '222',
//        'text' => '333',
//        'animals' => [ 'Кошка', 'Собака' ],
//        //$table->longText('animals'); //[]
//        //$table->longText('city_areas'); //[]
//        'number' => '444',
//        'email'=>'555',
//        'social_media'=>'666',
//        'agreement' => true
//        ];
//        foreach ($input['animals'] as $animal)
//        {
//            BecomeSitterAnimal::firstOrCreate([ 'animal' => $animal ]);
//        }
//        $Review = BecomeSitter::create($input);
//        $Review->animals()->sync(['Кошка', 'Собака']);
//
//        $BecomeSitter = BecomeSitter::with('animals')->get();
//        //$BecomeSitter = BecomeSitter::all();// with('animals')->();// all();//with('animals');//.get();// all();
//        return $this->sendResponse($BecomeSitter, 'Reviews retrieved successfully.');
//    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = json_decode($request->input('json'), true);
        $validator = Validator::make($input, [
            'name' => 'required',
            'lastName' => 'required',
            'text' => 'required',
            'animals' => 'required',
            'cityAreas' => 'required',
            'number' => 'required',
            'socialMedia' => 'required',
            'email' => 'required',
            'agreement' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        foreach ($input['animals'] as $animal)
        {
            BecomeSitterAnimal::firstOrCreate([ 'animal' => $animal ]);
        }
        $BecomeSitter = BecomeSitter::create($input);
        $BecomeSitter->animals()->sync($input['animals']);

        //$BecomeSitter = BecomeSitter::with('animals')->get();
        //$BecomeSitter = BecomeSitter::all();// with('animals')->();// all();//with('animals');//.get();// all();
        return $this->sendResponse($BecomeSitter->toArray(), 'BecomeSitter stored successfully.');    }
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        $Review = Review::find($id);
//        if (is_null($Review)) {
//            return $this->sendError('Review not found.');
//        }
//        return $this->sendResponse($Review->toArray(), 'Review retrieved successfully.');
//    }
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, Review $Review)
//    {
//        $input = $request->all();
//        $validator = Validator::make($input, [
//            'name' => 'required',
//            'detail' => 'required'
//        ]);
//        if($validator->fails()){
//            return $this->sendError('Validation Error.', $validator->errors());
//        }
//        $Review->name = $input['name'];
//        $Review->detail = $input['detail'];
//        $Review->save();
//        return $this->sendResponse($Review->toArray(), 'Review updated successfully.');
//    }
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(Review $Review)
//    {
//        $Review->delete();
//        return $this->sendResponse($Review->toArray(), 'Review deleted successfully.');
//    }
}



/*

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewsApiController extends Controller
{
  public function index()
  {
    return DB::table('reviews')->get();
  }
// return [
//  'category_id' => "1",
//  'category_title' => "2",
//  'category_color' => "3",
// ];
//}
//}
} */

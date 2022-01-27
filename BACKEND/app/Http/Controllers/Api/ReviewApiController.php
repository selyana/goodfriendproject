<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Review;
use Validator;
class ReviewApiController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Reviews = Review::all();
        return $this->sendResponse($Reviews->toArray(), 'Reviews retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = json_decode($request->input('json'), true);
        $validator = Validator::make($input, [
            'name' => 'required',
            'review' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $Review = Review::create($input);
        return $this->sendResponse($Review->toArray(), 'Review created successfully.');
    }
}

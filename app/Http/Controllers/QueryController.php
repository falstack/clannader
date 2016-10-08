<?php

namespace App\Http\Controllers;

use App\Clannader\Models\Morph\Timeline;
use Illuminate\Http\Request;

use App\Http\Requests;

class QueryController extends Controller
{
    protected $timeline;

    public function __construct(Timeline $timeline)
    {
        $this->timeline = $timeline;
    }

    public function index(Request $request)
    {
        $ret = $this->timeline->whereRaw('link_type = ? and type = ?', ['Bangumi', 'name'])->where('content','like','%'.$request->get('q').'%')->select('link_id')->first();

        if (is_null($ret)) {
            return response()->json([], 404);
        } else {
            return response()->json(['data' => $ret->link_id], 200);
        }
    }
}

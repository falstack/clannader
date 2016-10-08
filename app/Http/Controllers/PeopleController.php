<?php

namespace App\Http\Controllers;

use App\Clannader\Repository\PeopleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class PeopleController extends Controller
{

    protected $peopleRepository;

    public function __construct(PeopleRepository $peopleRepository)
    {
        $this->peopleRepository = $peopleRepository;
    }

    public function info(Request $request)
    {
        return $this->peopleRepository->getUserInfo($request->get('id'), $this->getUserIdByJWT());
    }
}

<?php

namespace App\Clannader\Repository;


class Repository
{


    public function responseOK($data)
    {
        return response()->json(['data' => $data], 200);
    }
}
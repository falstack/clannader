<?php

namespace App\Clannader;

use League\Fractal\Serializer\ArraySerializer;

class ApiSerializer extends ArraySerializer
{
    public function collection($resourceKey, array $data)
    {
        return ['data' => $data, 'status' => 200];
    }

    public function item($resourceKey, array $data)
    {
        return ['data' => $data, 'status' => 200];
    }
}
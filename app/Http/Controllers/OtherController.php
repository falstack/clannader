<?php

namespace App\Http\Controllers;

use App\Clannader\Repository\OtherRepository;


class OtherController extends Controller
{
    protected $otherRepository;

    public function __construct(OtherRepository $otherRepository)
    {
        $this->otherRepository = $otherRepository;
    }

    public function backgroundShow()
    {
        return $this->otherRepository->backgroundShow();
    }
}

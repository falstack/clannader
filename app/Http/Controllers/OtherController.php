<?php

namespace App\Http\Controllers;

use App\Clannader\Repository\OtherRepository;
use zgldh\QiniuStorage\QiniuStorage;

use Illuminate\Http\Request;


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

    public function uptoken()
    {
        $disk = QiniuStorage::disk('qiniu');
        $token = $disk->uploadToken();
        return response()->json(['uptoken' => $token], 200);
    }

    public function dollars(Request $request)
    {
        event(new \App\Events\User\Dollars($this->getAuthUser(), $request->get('content')));
    }
}

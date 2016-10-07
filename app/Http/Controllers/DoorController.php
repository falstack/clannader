<?php

namespace App\Http\Controllers;

use App\Clannader\Models\User;
use App\Clannader\Models\Zone;
use App\Clannader\Service\JWTService;
use App\Http\Requests\RegisterRequest;
use Auth;
use Illuminate\Http\Request;
use Laravist\GeeCaptcha\GeeCaptcha;
use Overtrue\LaravelPinyin\Facades\Pinyin as Overtrue;


class DoorController extends Controller
{
    protected $user;
    protected $zone;
    protected $JWTService;

    public function __construct(User $user,
                                Zone $zone,
                                JWTService $JWTService)
    {
        $this->user = $user;
        $this->zone = $zone;
        $this->JWTService = $JWTService;
    }


    public function index()
    {
        return view('welcome');
    }


    public function login(Request $request)
    {
        $data = $this->getLoginForm($request->all());

        if (Auth::attempt($data, $request->get('remember'))) {

            $user = Auth::user();

            $user->token = $this->JWTService->createToken($user);

            return $user;

        } else {

            return response()->json(['message' => '用户名或密码错误'], 422);
        }
    }

    public function register(RegisterRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'zone' => $this->createUserZone($request->get('name')),
            'avatar' => 'http://cdn.clannader.com/avatar',
            'banner' => 'http://cdn.clannader.com/B-banner',
            'sex' => 0,
            'autograph' => '这个人很懒，什么都没有留下。'
        ];

        $this->user->create($data);
    }

    public function captcha()
    {
        $captcha = new GeeCaptcha(env('CAPCHA_ID'), env('CAPCHA_KEY'));

        return $captcha->GTServerIsNormal();
    }

    public function logout()
    {
        Auth::logout();
    }

    protected function createUserZone($name)
    {
        $pinyin = Overtrue::permalink($name);

        $tail = $this->zone->where('name', $pinyin)->count();

        if ($tail) {

            $array = str_split(($tail), 2);

            foreach ($array as $item) {
                $pinyin = $pinyin . '-' . $item;
            }

            return $pinyin;
        } else {

            $this->zone->create(['name' => $pinyin]);

            return $pinyin;
        }
    }

    protected function getLoginForm($request)
    {
        if ($request['method'] == 'phone') {
            $data = [
                'phone' => $request['access'],
                'password' => $request['secret']
            ];
        } else {
            $data = [
                'email' => $request['access'],
                'password' => $request['secret']
            ];
        }

        return $data;
    }
}

<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Http\Requests\Auth\LoginRequest;
// use Illuminate\Auth;
// use App\Model\User;
// use JWTAuth;

// class Login extends Controller
// {
//     use AuthenticatesUsers;

//     /**
//      * Where to redirect users after login.
//      *
//      * @var string
//      */
//     protected $redirectTo = RouteServiceProvider::HOME;

//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('guest')->except('logout');
//     }

//     public function login(LoginRequest $request)
//     {
//         $request = $request->userInput;
//         return $this->publishToken($request);
//     }

//     protected function publishToken($request)
//     {
//         $token = auth('api')->attempt(['email' => $request['email'], 'password' => $request['password']]);
//         return $this->respondWithToken($token);
//     }

//     protected function respondWithToken($token)
//     {
//         return response()->json([
//             'access_token' => $token,
//             'token_type' => 'bearer',
//             'expires_in' => auth('api')->factory()->getTTL() * 60,
//             'user' => auth('api')->user(),
//         ]);
//     }
// }

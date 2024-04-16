<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController as BaseController;
use App\Http\Controllers\UserController as UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class AuthController extends BaseController
{

    // Авторизация
    public function login(Request $request)
    {

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])){
            $auth = Auth::user();

            if (UserController::checkToken($auth->id, $request->bearerToken())){

                $success['token'] = $auth->tokens->first()->token;
                $success['name'] = $auth->name;

                return $this->handleResponse($success, 'User logged-in!');
            }
            else {
                return $this->handleError('Unauthorised', ['error' => 'Bad token']);
            }

        }
        else{
            return $this->handleError('Unauthorised', ['error' => 'Unauthorised']);
        }
    }

    // Регистрация (роут выключен)
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $input = $request->all();
        //$input['password'] = Hash::make($input['password']);
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        $success['name'] = $user->name;

        return $this->handleResponse($success, 'User successfully registered!');
    }


}

<?php


namespace App\Http\Controllers\v1;


use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller

{

    public function sendResponse($result, $message)

    {

        $response = [

            'success' => [
                'firstName' => $result['firstName'],
                'lastName' => $result['lastName'],
                'email' => $result['email'],
                'token' => $result['token'],
                'message' => $message,
                'user' => User::get()->find($result['email'])
            ],

        ];


        return response()->json($response, 200);

    }


    public function sendError($error, $errorMessages = [], $code = 404)

    {

        $response = [

            'success' => false,

            'message' => $error,

        ];


        if(!empty($errorMessages)){

            $response['data'] = $errorMessages;

        }


        return response()->json($response, $code);

    }

}

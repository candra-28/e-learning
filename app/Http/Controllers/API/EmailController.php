<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendFeedback;
use Exception;

class EmailController extends Controller
{
    public function storeFeedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'  => 'required',
            'email'       => 'required|email',
            'message'     => 'required|min:5|max:255'

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json([
                'message' => 'Bad request',
                'error'   => $errors->toJson(),
            ], 400);
        }

        $emailFeedback = [
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'message'       => $request->message,
        ];

        try {
            Mail::to('suhermana274@gmail.com')->send(new SendFeedback($emailFeedback));

            return response()->json([
                'status'    => 'success',
                'data'      => $emailFeedback,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status'    => 'error',
                'message'   => $e->getMessage(),
            ], 500);
        }

    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    // جلب بيانات المستخدم الحالي
    public function show(Request $request)
    {
        $user = $request->user();
        return response()->json($user);
    }

    // تحديث بيانات المستخدم
    public function update(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'firstName' => 'sometimes|string|max:255',
            'lastName' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // تحديث البيانات العادية
        if ($request->has('firstName')) $user->first_name = $request->firstName;
        if ($request->has('lastName')) $user->last_name = $request->lastName;
        if ($request->has('email')) $user->email = $request->email;



        $user->save();

        return response()->json($user);
    }
}

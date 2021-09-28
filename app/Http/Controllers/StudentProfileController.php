<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */


    public function registration(Request $request)
    {
        $fields = $request->validate([
            'id_number' => 'required',
            'password' => 'required|min:6|max:25|confirmed',
        ]);



        $profile = StudentProfile::create();


        $user = new User([
            'id_number' => $fields['id_number'],
            'password' => Hash::make($fields['password']),
        ]);

        $profile->user()->save($user);


        $token = $user->createToken('auth')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }



    public function login(Request $request)
    {
        $fields = $request->validate([
            'id_number' => 'required',
            'password' => 'required'
        ]);

        $user = User::query()->where('id_number', $fields['id_number'])->first();

        if ($user && Hash::check($fields['password'], $user->password) && $user->profile_type === User::PROFILE_STUDENT) {

            $token = $user->createToken('auth')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);

        } else {

            return response()->json([
                'message' => 'Invalid credentials!'
            ], 401);

        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function show(StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentProfile $studentProfile)
    {
        //
    }
}

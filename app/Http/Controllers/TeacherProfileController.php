<?php

namespace App\Http\Controllers;

use App\Models\TeacherProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TeacherProfileController extends Controller
{
    public function registration(Request $request)
    {
        $fields = $request->validate([
            'id_number' => 'required',
            'password' => 'required|min:6|max:25',
        ]);

        $profileFields = $request->validate([
            'name' => 'nullable',
            'email' => 'nullable',
            'contact_number' => 'nullable',

            'age' => 'nullable',
            'gender' => 'nullable',

            'position' => 'nullable',
            'total_taken_courses' => 'nullable',

            'no_of_classes' => 'nullable',
            'batch_teacher' => 'nullable',
        ]);

        $profile = TeacherProfile::create($profileFields);


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

        if ($user && Hash::check($fields['password'], $user->password) && $user->profile_type === User::PROFILE_TEACHER ) {

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
     * @param  \App\Models\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherProfile $teacherProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherProfile $teacherProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherProfile $teacherProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherProfile $teacherProfile)
    {
        //
    }
}

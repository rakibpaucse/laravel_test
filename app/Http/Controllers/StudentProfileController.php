<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudentProfile;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Plank\Mediable\Facades\MediaUploader;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */


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

            'sgpa' => 'nullable',
            'cgpa' => 'nullable',

            'credit_earned' => 'nullable',
            'course_completed' => 'nullable',

            'blood_group' => 'nullable',
            'batch' => 'nullable',
        ]);

        $profile = StudentProfile::create($profileFields);


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
    public function getProfile()
    {
        //

        return Auth::user()->load(['profile']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\Response
     */
    public function getDashboardData()
    {
        //
        return Auth::user()->load(['profile', 'studentCourses']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getRoutine()
    {

    }



    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|file'
        ]);


        $media = MediaUploader::fromSource($request->file('image'))
            ->toDestination('public', 'uploads')
            ->upload();

        if ($media) {
            $student = auth()->user()->profile;

            $student->attachMedia($media, 'profilePic');

            return response()->json([
                'message' => 'Image Upload successful',
                'image_url' => $media->getUrl(),
                'image_id' => $media->id
            ], 201);
        } else {
            return response()->json([
                'message' => 'File upload failed !'
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);


        $media = MediaUploader::fromSource($request->file('file'))
            ->toDestination('public', 'uploads')
            ->upload();

        if ($media) {
//            $student = auth()->user()->profile;
//
//            $student->attachMedia($media, 'profilePic');

            return response()->json([
                'message' => 'File Upload successful',
                'file_url' => $media->getUrl(),
                'file_id' => $media->id
            ], 201);
        } else {
            return response()->json([
                'message' => 'File upload failed !'
            ], 422);
        }
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

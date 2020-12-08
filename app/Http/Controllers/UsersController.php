<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        /**Take note of this: Your user authentication access token is generated here **/
        $data['token'] =  $user->createToken('MyApp')->accessToken;
        $data['name'] =  $user->name;

        return response(['data' => $data, 'message' => 'Account created successfully!', 'status' => true]);
    }

    public function delete(Request $request)
    {
        $input = $request->all();
        $user = User::findOrFail($input['id']);
        // User::delete( $input['id']);
        // dd($input);
        $user->delete();
        return response(['data' => $user, 'message' => 'Account deleted successfully!', 'status' => true]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        $request->user()->token()->delete();

        $response = 'You have been logged out';
        return response($response, 200);
    }

    public function index (Request $request) {
        // $input = $request->all();
        // return User::findOrFail($input['id'])->with(['projects', 'sub_projects']);
        $user = $request->user();
        // dd($user->id);
        // $allUserData = $user->with(['projects']);
        $allUserData = User::where('id', $user->id)->with(['projects'])->get();
        // dd($allUserData);
        return $allUserData;
    }

    public function sayHello()
    {
        return "Hello";
    }
}

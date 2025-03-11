<?php

namespace App\Http\Controllers\API;

use Log;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function profile()
    {
        try {
            $userId = Auth::id();
            $user = User::find($userId);
            $data = new UserResource($user);

            $payload = [
                'code' => 200,
                'app_message' => 'success',
                'user_message' => 'success',
                'data' => $data
            ];

            return response()->json($payload, 200);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'An error occurred while fetching data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function data(Request $request)
    {
        try {
            $users = User::query();
            $total = $users->count();

            if ($request->filled('limit')) {
                $limit = $request->filled('limit') ? $request->limit : 15;
                $currentPage = $request->filled('page') ? $request->page : 1;
                $skip = 0;
                if ($currentPage > 1) {
                    $skip = ($limit * ($currentPage - 1));
                }

                $users = $users->skip($skip)->take($limit)->get();
            } else {
                $users = $users->get();
            }
            $data = UserResource::collection($users);

            $payload = [
                'code' => 200,
                'app_message' => 'success',
                'user_message' => 'success',
                'total' => $total,
                'data' => $data
            ];

            return response()->json($payload, 200);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'An error occurred while fetching data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $user = User::find($id);

            if ($user) {
                $data = new UserResource($user);

                $payload = [
                    'code' => 200,
                    'app_message' => 'success',
                    'user_message' => 'success',
                    'data' => $data
                ];

                return response()->json($payload, 200);
            } else {
                $payload = [
                    'code' => 404,
                    'app_message' => 'Not Found',
                    'user_message' => 'This user is not available.',
                ];

                return response()->json($payload, 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'An error occurred while fetching data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function createUser(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'phone' => 'nullable',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
                'address' => 'nullable',
                'type' => 'nullable',
            ]);
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'type' => $request->type
            ]);

            //role for laravel spatie 
            // $role = Role::where('name', $request->input('role'))->first();
            // $user->syncRoles($request->input('role'));
            if($user){
                return response()->json([
                    'code' => 201,
                    'message' => 'User created successfully',
                ], 201);
                
            }else{
                return response()->json([
                    'code' => 500,
                    'message' => 'An error occurred while creating user',
                    'error' => 'An error occurred while creating user',
                ], 500);
            }
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'code' => 422,
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json([
                'code' => 500,
                'message' => 'An error occurred while creating user',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function Update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'nullable',
                'phone' => 'nullable',
                'address' => 'nullable',
                'email' => 'nullable',
                'type' => 'nullable',
            ]);

            $userId = $id;
            $user = User::findOrFail($userId);
            if ($user) {
                $user->update($validatedData);
            }
            
            // if ($request->has('role') || $request->filled('role')) {
            //     $role = Role::where('name', $request->input('role'))->first();
            //     $user->syncRoles($request->input('role'));
            // }

            $payload = [
                'code' => 200,
                'app_message' => 'success',
                'user_message' => 'success',
                'data' => new UserResource($user)
            ];

            return response()->json($payload, 200);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'An error occurred while updating data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {

            $user = User::find($id);
            $userName = $user->name;
            if( $user ){

                $user->delete();
                $payload = [
                    'code' => 200,
                    'app_message' =>  $userName . ' deleted successfully.',
                    'user_message' => $userName . ' deleted successfully.'
                ];

                return response()->json($payload, 200);
            } else {
                $payload = [
                    'code' => 404,
                    'app_message' => 'Not Found',
                    'user_message' => 'This user is not available.',
                ];

                return response()->json($payload, 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'An error occurred while deleting data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}

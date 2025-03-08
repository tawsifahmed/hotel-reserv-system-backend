<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'phone' => 'nullable|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
            ]);
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            if( $user ){
                return response()->json([
                    'code' => 201,
                    'message' => 'Registration success.',
                ], 201);
            }else{
                return response()->json([
                    'code' => 500,
                    'message' => 'An error occurred while registering user',
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
                'message' => 'An error occurred while registering user',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if ($user) {
                    $token = $user->createToken('API Token')->plainTextToken;

                    return response()->json([
                        'code' => 200,
                        'message' => 'Login successful',
                        'access_token' => $token,
                        // 'user_type' => $user->roles->pluck('name')->first(),
                        // 'permissions' => $user->getAllPermissions()->pluck('name'),

                    ], 200);
                }
            }

            return response()->json([
                'code' => 401,
                'message' => 'invalid email or password.',
            ], 401);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'An error occurred while logging in',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'code' => 200,
                'message' => 'Logout successful',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'An error occurred while logging out',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function forgotPasswordOtp(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            $time = Carbon::now();
            $time = $time->format('Y-m-d H:i:s');

            if ($user) {
                $otp = UserOtp::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
                if ($otp->otp == $request->otp) {
                    $token = $user->createToken('API Token')->plainTextToken;
                     $user->tokens()->update(['expires_at' => now()->addHours(2)]);

                    return response()->json([
                        'code' => 200,
                        'message' => 'success',
                        'token' => $token,
                    ], 200);
                } else {
                    return response()->json([
                        'code' => 403,
                        'message' => 'invalid otp',
                    ], 403);
                }
            }
        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json([
                'code' => 500,
                'message' => 'An error occurred while verifing email',
                'error' => $e->getMessage(),
            ], 500);
        }

    }
    public function forgotPassword(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            } else {
                // $createPass = rand(1234, 9999);
                $otpCode= 123456;

                UserOtp::create([
                    'user_id' => $user->id,
                    'otp' => $otpCode,
                    'expire_at' => Carbon::now()->addMinutes(5)
                ]);

                $message = 'Your OTP is: ' . $otpCode;

                $this->password_varification($message, $request->email);

                return response()->json([
                    'code' => 200,
                    'message' => 'check your otp',
                ], 200);
            }
        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json([
                'code' => 500,
                'message' => 'something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required',
                'password' => ['nullable', 'min:6'],
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
            } else {
                return response()->json(['message' => 'You did not change the password'], 400);
            }

            return response()->json(['message' => 'Password reset successfully', 'code' =>  200], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to reset password', 'error' => $e->getMessage()], 500);
        }
    }

}

<?php

namespace App\Http\Controllers\API;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getNotifications(Request $request)
    {
        $requestData = $request->all();
        $limit = $request->has('limit') ? $requestData['limit'] : 15;
        $currentPage = $request->has('page') ? $requestData['page'] : 1;
        $userId = Auth::id();

        $notifications = Notification::where('user_id', $userId)
                                    ->orderBy('created_at', 'desc')
                                    ->skip(($currentPage - 1) * $limit)
                                    ->take($limit)
                                    ->get();

        $payload = [
            'code' => 200,
            'app_message' => 'success',
            'user_message' => 'success',
            'data' => $notifications
        ];
                    
        return response()->json($payload, 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'is_read' => 'required',
            ]);

            $updatedNotification = Notification::find($id);

            if (!empty($updatedNotification)) {
                $updatedNotification->update($validatedData);
            } else {
                $payload = [
                    'code' => 404,
                    'app_message' => 'Not Found',
                    'user_message' => 'This notification is not available',
                ];
                return response()->json($payload, 404);
            }

            $data = $updatedNotification;

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
                'message' => 'An error occurred while updating data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function readAll()
    {
        try {

            $userId = Auth::user()->id;

            $updatedNotification = Notification::where('user_id', $userId)->get();

            if (!empty($updatedNotification)) {
                foreach ($updatedNotification as $singleNotification) {
                    $singleNotification->update([
                        'is_read' => 1
                    ]);
                }
            } else {
                $payload = [
                    'code' => 404,
                    'app_message' => 'Not Found',
                    'user_message' => 'This notification is not available',
                ];
                return response()->json($payload, 404);
            }

            $data =  $updatedNotification;

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
                'message' => 'An error occurred while updating data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

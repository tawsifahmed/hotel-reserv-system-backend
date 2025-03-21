<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Reservation;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Exports\ReservationsExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $query = Reservation::with('room', 'user');
        if ($request->has('user_id')) $query->where('user_id', $request->user_id);
        if ($request->has('room_id')) $query->where('room_id', $request->room_id);
        if ($request->has('start_date')) $query->where('start_date', '>=', $request->start_date);
        if ($request->has('end_date')) $query->where('end_date', '<=', $request->end_date);
        $reservations = $query->get()->append('floor');

        return response()->json($reservations);
    }

    public function show($id)
    {
        $reservation = Reservation::with('room', 'user')->find($id)->append('floor');
        // dd($reservation);
        if (!$reservation) {
            return response()->json([
                'code' => 404,
                'app_message' => 'Reservation not found.',
                'user_message' => 'Reservation does not exist.',
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'app_message' => 'Reservation found successfully.',
            'user_message' => 'Reservation details retrieved successfully.',
            'data' => $reservation,
        ], 200);
    }

    public function createNotification($userId, $reservationId, $text)
    {
        Notification::create([
            'user_id' => $userId,
            'created_by' => $createdBy ?? Auth::id(),
            'reservation_id' => $reservationId,
            'text' => $text,
            'is_read' => 0,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_price' => 'required',
            'is_paid' => 'nullable',
        ]);
        $request['user_id'] = Auth::user()->id;
        $reservation = Reservation::create($request->all());
        // dd($reservation);

        //notification for client
        $this->createNotification(
            Auth::user()->id,
            $reservation->id,
            'You have booked a room. An admin will review soon.'
        );

        //notification for admins
        $admins = User::where('type', 'admin')->get();
        foreach ($admins as $admin) {
            $this->createNotification(
                $admin->id,
                $reservation->id,
                'User ' . Auth::user()->name. ' has booked a room.'
            );
        }
        $payload = [
            'code' => 201,
            'app_message' => 'Reservation created successfully.',
            'user_message' => 'Reservation created successfully.',
            'data' => $reservation
        ];

        return response()->json($payload, 201);
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $request->validate([
            'status' => 'required',
            'is_paid' => 'nullable',
            'room_id' => 'exists:rooms,id'
        ]);

        // if (Auth::user()->type != 'admin') {
        //     $request['user_id'] = Auth::user()->id;
        // }

        $reservation->update($request->all());
        if (Auth::user()->type == 'client') {
            //notification for client
            $this->createNotification(
                Auth::user()->id,
                $reservation->id,
                'You have ' . $request->status . ' your reservation.'
            );

            if($request->is_paid == 1){
                $this->createNotification(
                    Auth::user()->id,
                    $reservation->id,
                    'You have paid for your reservation.'
                );
            }

        } else {
            //notification for client
            $this->createNotification(
                $reservation->user_id,
                $reservation->id,
                'An admin has ' . $request->status . ' your reservation.'
            );

            if($request->is_paid == 1){
                $this->createNotification(
                    Auth::user()->id,
                    $reservation->id,
                    'User ' . $reservation->user->name . ' has paid for a reservation.'
                );
            }

            //notification for admins
            $admins = User::where('type', 'admin')->get();
            foreach ($admins as $admin) {
                $this->createNotification(
                    $admin->id,
                    $reservation->id,
                    'An admin has ' . $request->status . ' the reservation of user ' . $reservation->user->name . '.'
                );
            }
        }
        $payload = [
            'code' => 200,
            'app_message' => 'Reservation updated successfully.',
            'user_message' => 'Reservation updated successfully.',
            'data' => $reservation
        ];

        return response()->json($payload, 200);
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return response()->json(['message' => 'Reservation cancelled']);
    }

    public function downloadExcelReport(Request $request)
    {
        $query = Reservation::with('room', 'user');
        if ($request->has('user_id')) $query->where('user_id', $request->user_id);
        if ($request->has('room_id')) $query->where('room_id', $request->room_id);
        if ($request->has('total_price')) $query->where('total_price', $request->total_price);
        if ($request->has('status')) $query->where('status', $request->status);
        if ($request->has('start_date')) $query->where('start_date', '>=', $request->start_date);
        if ($request->has('end_date')) $query->where('end_date', '<=', $request->end_date);

        $reservations = $query->get()->map(function ($reservation) {
            return [
                'user_name' => $reservation->user->name,
                'start_date' => $reservation->start_date,
                'end_date' => $reservation->end_date,
                'status' => $reservation->status,
                'room_name' => $reservation->room->name,
                'floor_name' => $reservation->room->floor->name,
                'price_per_night' => $reservation->room->price_per_night,
                'total_price' => $reservation->total_price,
            ];
        });

        // dd($reservations);
        $date_str = date('Y_m_d_H_i_s');

        $excelRelativePath = "public/excels/reports/" . $date_str . "_reservaton.xls";

        $export = new ReservationsExport(collect($reservations));

        Excel::store($export, $excelRelativePath);

        $excel_path = Storage::url($excelRelativePath);

        $payload = [
            'code' => 200,
            'app_message' => 'CSV created successfully.',
            'user_message' => 'CSV created successfully.',
            'download_path' => asset($excel_path),
        ];

        return response()->json($payload, 200);
    }

}

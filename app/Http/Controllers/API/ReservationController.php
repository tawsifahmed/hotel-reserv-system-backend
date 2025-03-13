<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Floor;
use App\Models\Reservation;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        ]);
        $request['user_id'] = Auth::user()->id;
        $reservation = Reservation::create($request->all());
        
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

        return response()->json($reservation, 201);
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $request->validate([
            'status' => 'required',
        ]);
        $request['user_id'] = Auth::user()->id;

        $reservation->update($request->all());
        if(Auth::user()->type == 'client'){
            //notification for client
            $this->createNotification(
                Auth::user()->id,
                $reservation->id,
                'You have '.$request->status.' your reservation.'
            );
        }else{
            $this->createNotification(
                Auth::user()->id,
                $reservation->id,
                'An admin has '.$request->status.' your reservation.'
            );
            
            //notification for admins 
            $admins = User::where('type', 'admin')->get();
            foreach ($admins as $admin) {
                $this->createNotification(
                    $admin->id,
                    $reservation->id,
                    'An admin has '.$request->status.' your reservation.'
                );
            }
        }

        return response()->json($reservation);
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return response()->json(['message' => 'Reservation cancelled']);
    }
}

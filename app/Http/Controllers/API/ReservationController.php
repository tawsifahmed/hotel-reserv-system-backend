<?php

namespace App\Http\Controllers\API;

use App\Models\Floor;
use App\Models\Reservation;
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

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $request['user_id'] = Auth::user()->id;
        $reservation = Reservation::create($request->all());
        return response()->json($reservation, 201);
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $request->validate([
            'room_id' => 'required',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after_or_equal:start_date',
        ]);
        $request['user_id'] = Auth::user()->id;

        $reservation->update($request->all());
        return response()->json($reservation);
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return response()->json(['message' => 'Reservation cancelled']);
    }
}

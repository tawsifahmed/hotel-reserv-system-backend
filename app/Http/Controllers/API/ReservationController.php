<?php

namespace App\Http\Controllers\API;

use App\Models\Floor;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $query = Reservation::query();
        if ($request->has('user_id')) $query->where('user_id', $request->user_id);
        if ($request->has('room_id')) $query->where('room_id', $request->room_id);
        if ($request->has('start_date')) $query->where('start_date', '>=', $request->start_date);
        if ($request->has('end_date')) $query->where('end_date', '<=', $request->end_date);
        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'seat_id' => 'required|exists:seats,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $reservation = Reservation::create($request->all());
        return response()->json($reservation, 201);
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $request->validate([
            'seat_id' => 'sometimes|exists:seats,id',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after_or_equal:start_date',
        ]);
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

<?php

namespace App\Http\Controllers\API;

use App\Models\Room;
use App\Models\Seat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $query = Room::with('seats');

        if ($request->has('floor_id')) {
            $query->where('floor_id', $request->floor_id);
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'floor_id' => 'required|integer|exists:floors,id',
            'price_per_night' => 'required|numeric',
            'seats' => 'array',
            'seats.*.seat_number' => 'required|string',
            'seats.*.status' => 'in:available,reserved'
        ]);

        $room = Room::create($request->only(['name', 'floor_id', 'price_per_night']));

        if (!empty($request->seats)) {
            foreach ($request->seats as $seat) {
                $room->seats()->create($seat);
            }
        }

        return response()->json($room->load('seats'), 201);
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string',
            'price_per_night' => 'sometimes|required|numeric',
            'seats' => 'array',
            'seats.*.id' => 'sometimes|exists:seats,id',
            'seats.*.seat_number' => 'sometimes|required|string',
            'seats.*.status' => 'sometimes|in:available,reserved'
        ]);

        $room->update($request->only(['name', 'price_per_night']));

        if (!empty($request->seats)) {
            foreach ($request->seats as $seatData) {
                if (isset($seatData['id'])) {
                    $seat = Seat::findOrFail($seatData['id']);
                    $seat->update($seatData);
                } else {
                    $room->seats()->create($seatData);
                }
            }
        }

        return response()->json($room->load('seats'));
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return response()->json(['message' => 'Room deleted successfully']);
    }
}

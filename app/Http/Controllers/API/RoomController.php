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
        $query = Room::with('floor');
        $query->join('reservations','rooms.id','=','reservations.room_id');
        if ($request->has('floor_id')) {
            $query->where('floor_id', $request->floor_id);
        }
        if($request->start_date && $request->end_date){
            $query->where(function ($query) use ($request) {
                $query->where('reservations.end_date', '<=', $request->start_date)
                      ->orWhereNull('reservations.end_date');
            })
            ->orWhere(function ($query) use ($request) {
                $query->where('reservations.start_date', '>=', $request->end_date);
            });
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'floor_id' => 'required|integer|exists:floors,id',
            'price_per_night' => 'required|numeric',
            'seats' => 'required|integer',
            // 'seats.*.status' => 'in:available,reserved'
        ]);

        $room = Room::create($request->only(['name', 'floor_id', 'price_per_night','seats']));

        // if (!empty($request->seats)) {
        //     foreach ($request->seats as $seat) {
        //         $room->seats()->create($seat);
        //     }
        // }

        return response()->json($room, 201);
    }

    public function update(Request $request, $id)
    {

        $room = Room::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string',
            'price_per_night' => 'sometimes|required|numeric',
            'floor_id' => 'required|integer',
            'seats' => 'required|integer',
        ]);
        $room->update($request->only(['name', 'price_per_night','floor_id','seats']));

        // if (!empty($request->seats)) {
        //     foreach ($request->seats as $seatData) {
        //         if (isset($seatData['id'])) {
        //             $seat = Seat::findOrFail($seatData['id']);
        //             $seat->update($seatData);
        //         } else {
        //             $room->seats()->create($seatData);
        //         }
        //     }
        // }

        return response()->json($room);
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return response()->json(['message' => 'Room deleted successfully']);
    }
}

<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Seat;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $startDate = isset($request->start_date) ? ($request->start_date . ' 00:00:00') : null;
        $endDate = isset($request->end_date) ? ($request->end_date . ' 23:59:59') : null;

        $query = Room::with('floor')
            ->select('rooms.*')
            ->distinct(); // prevent duplicate room records

        if ($startDate && $endDate) {
            // reserved same rooms in different dates
            $reservedRooms = Reservation::where(function ($query) use ($startDate, $endDate) {
                $query->where('start_date', '<', $endDate)
                    ->where('end_date', '>', $startDate);
            })->pluck('room_id');

            //exclude reserved rooms from the results
            if (!$reservedRooms->isEmpty()) {
                $query->whereNotIn('rooms.id', $reservedRooms);
            }
        }

        if ($request->has('floor_id')) {
            $query->where('rooms.floor_id', $request->floor_id);
        }
        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required|string',
            'floor_id' => 'required|integer|exists:floors,id',
            'price_per_night' => 'required|numeric',
            'seats' => 'required|integer',
            // 'seats.*.status' => 'in:available,reserved'
        ]);

        $room = Room::create($validData);
        // if (!empty($request->seats)) {
        //     foreach ($request->seats as $seat) {
        //         $room->seats()->create($seat);
        //     }
        // }


        $payload = [
            'code' => 201,
            'data' => $room
        ];
        return response()->json($payload, 201);

        // return response()->json($room, 201);
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
        $room->update($request->only(['name', 'price_per_night', 'floor_id', 'seats']));

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

        $payload = [
            'code' => 200,
            'data' => $room
        ];
        return response()->json($payload, 200);
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $payload = [
            'code' => 200,
            'message' => 'Room deleted successfully'
        ];
        $room->delete();
        return response()->json($payload, 200);
    }
}

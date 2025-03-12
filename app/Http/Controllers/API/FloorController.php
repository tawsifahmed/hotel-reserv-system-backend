<?php

namespace App\Http\Controllers\API;

use App\Models\Floor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FloorController extends Controller
{
    public function index()
    {
        return response()->json(Floor::select('id', 'name')->get());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $floor = Floor::create(['name' => $request->name]);
        $payload = [
            'code' => 201,
            'data' => $floor
        ];
        return response()->json($payload, 201);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $floor = Floor::findOrFail($id);
        $floor->update(['name' => $request->name]);
        $payload = [
            'code' => 200,
            'data' => $floor
        ];
        return response()->json($payload, 200);
    }

    public function destroy($id)
    {
        $floor = Floor::findOrFail($id);
        $payload = [
            'code' => 200,
            'message' => 'Floor deleted successfully'
        ];
        $floor->delete();
        return response()->json($payload, 200);
    }
}

<?php

namespace App\Http\Controllers\Administrative;

use DateTime;
use DataTables;
use App\Models\Instance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class InstanceController extends Controller
{
    public function index()
    {
        return view('administrative.instance.index');
    }
    public function data()
    {
        return  $this->getAllData();
    }
    public function create()
    {
        return view('administrative.instance.create');
    }
    public function store(Request $request)
    {
        $filePath = '';
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filePath = $file->store('uploads', 'public');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'startDate' => 'nullable',
            'endDate' => 'nullable',
            'location' => 'nullable|string|max:255',
            'scanLimitations' => 'required',
        ]);

        $instance = new Instance();
        $key = random_int(0, 999999);
        $instance->code =str_pad($key, 6, 0, STR_PAD_LEFT);
        $instance->name = $request->input('name');
        $instance->description = $request->input('description');
        $instance->start_date_time = $request->input('startDate');
        $instance->end_date_time = $request->input('endDate');
        $instance->location = $request->input('location');
        $instance->attachment = $filePath;
        $instance->scan_limitation = $request->input('scanLimitations');
        $instance->save();

        return  redirect()->route('administrative.instance')->with('success', 'Instance added successfully');
    }

    public function edit($id)
    {
        $data = Instance::findOrFail($id);
        return view('administrative.instance.edit', compact('data'));
    }

    public function show($id)
    {
        $data = Instance::findOrFail($id);
        return view('administrative.instance.show', compact('data'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'startDate' => 'nullable',
            'endDate' => 'nullable',
            'location' => 'nullable|string|max:255',
            'scanLimitations' => 'required',
        ]);

        $instance = Instance::findOrFail($id);

        $filePath = $instance->attachment;


        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filePath = $file->store('uploads', 'public');
        }
        if(!$instance->code){
            $key = random_int(0, 999999);
            $instance->code =str_pad($key, 6, 0, STR_PAD_LEFT);
        }
        $instance->name = $request->input('name');
        $instance->description = $request->input('description');
        $instance->start_date_time = $request->input('startDate');
        $instance->end_date_time = $request->input('endDate');
        $instance->location = $request->input('location');
        $instance->attachment =  $filePath;
        $instance->scan_limitation = $request->input('scanLimitations');
        $instance->save();

        return redirect()->route('administrative.instance')->with('success', 'Instance update successfully');
    }

    public function destroy($id)
    {
        $instance = Instance::findOrFail($id);
        $instance->delete();
        echo 'success';
    }


    public function getAllData()
    {
        $data = Instance::get();
        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                $html = '';
                $html .= '<ul class="orderDatatable_actions mb-0 d-flex justify-content-start flex-wrap">';
                if(auth()->user()->hasPermissionTo('read_instance')){
                    $html .= '<li>
                                <a href="' . route('administrative.instance.show', $row->id) . '" class="edit">
                                <i class="fas fa-eye"></i>
                                </a>
                            </li>';
                }
                if(auth()->user()->hasPermissionTo('update_instance')) {
                    $html .= ' <li>
                                    <a href="' . route('administrative.instance.edit', $row->id) . '" class="edit">
                                        <i class="uil uil-edit"></i>
                                    </a>
                                </li>';
                }
                if(auth()->user()->hasPermissionTo('delete_instance')) {
                    $html .= ' <li>
                                    <a href="#" onclick="deleteData(' . $row->id . ');" class="edit">
                                    <i class="fas fa-trash-alt"></i>
                                    </a>
                                </li>';
                }
                $html .= '</ul>';
                return $html;
            })

            ->editColumn('start_date_time', function ($row) {
                $formattedDate = '-';
                if (!empty($row->start_date_time)) {
                    $dateTime = new DateTime($row->start_date_time);

                    $formattedDate = $dateTime->format("d M, Y g:i a");
                }
                return $formattedDate;
            })
            ->editColumn('end_date_time', function ($row) {
                $formattedDate = '-';
                if (!empty($row->end_date_time)) {
                    $dateTime = new DateTime($row->end_date_time);

                    $formattedDate = $dateTime->format("d M, Y g:i a");
                }
                return $formattedDate;
            })

            ->rawColumns(['action', 'start_date_time', 'end_date_time'])
            ->blacklist(['created_at', 'updated_at', 'action', 'deleted_at'])
            ->addIndexColumn()
            ->toJson();
    }
}

<?php

namespace App\Http\Controllers\Administrative;

use App\Permission;
use Illuminate\Http\Request;
use App\Service\PermissionService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PermissionStoreRequest;

class PermissionController extends Controller
{

    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }


    public function index()
    {
        return view('administrative.permission.index');
    }
    public function data()
    {
        return  $this->permissionService->getAllData();
    }
    public function create()
    {
        return view('administrative.permission.create');
    }
    public function store(PermissionStoreRequest $request)
    {
        $input = $request->except('_token');
        $request = new Request($input);
        $result = $this->permissionService->store($request);
        if ($result) {
            return redirect()->route('administrative.permission')->with('success', 'Permission Created Successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Something Wrong,Please Try Again');
        }
    }
    public function edit($id)
    {
        $data =  $this->permissionService->findbyId($id);
        return view('administrative.permission.edit', compact('data'));
    }
    public function update($id, Request $request)
    {
        $input = $request->except('_token');
        $request = new Request($input);
        $result = $this->permissionService->update($id, $request);
        if ($result) {
            return redirect()->route('administrative.permission')->with('success', 'Permission Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Wrong,Please Try Again');
        }
    }

    public function destroy($id)
    {
        $result = $this->permissionService->destroy($id);
        if ($result) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

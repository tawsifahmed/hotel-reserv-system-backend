<?php

namespace App\Http\Controllers\Administrative;

use App\Service\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\RoleStoreRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        return view('administrative.role.index');
    }
    public function data()
    {
        return  $this->roleService->getAllData();
    }
    public function create()
    {
        $permissions = Permission::get()->pluck('name', 'name');
        return view('administrative.role.create', compact('permissions'));
    }
    public function store(RoleStoreRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        $input = $request->except('_token', 'permission');
        $permissionRequest = $request->except('_token', 'name');
        $request = new Request($input);
        $result = $this->roleService->store($request);
        $permissions = $permissionRequest ? $permissionRequest : [];
        $result->givePermissionTo($permissions);
        if ($result) {
            return redirect()->route('administrative.role')->with('success', 'Role Created Successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Something Wrong,Please Try Again');
        }
    }
    public function edit($id)
    {
        $permissions = Permission::get()->pluck('name', 'name');
        $data =  $this->roleService->findbyId($id);
        return view('administrative.role.edit', compact('data', 'permissions'));
    }
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required',Rule::unique('roles')->ignore($id)],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        $input = $request->except('_token', '_method', 'permission');
        $permissionRequest = $request->except('_token', '_method', 'name');
        $request = new Request($input);
        $role = Role::find($id);
        $role->update($input);
        $permissions = $permissionRequest ? $permissionRequest : [];
        $role->syncPermissions($permissions);
        if ($role) {
            return redirect()->route('administrative.role')->with('success', 'Role Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Wrong,Please Try Again');
        }
    }

    public function destroy($id)
    {
        $result = $this->roleService->destroy($id);
        if ($result) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

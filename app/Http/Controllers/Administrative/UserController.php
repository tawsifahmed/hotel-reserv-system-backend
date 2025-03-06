<?php

namespace App\Http\Controllers\Administrative;

use Carbon\Carbon;
use App\Models\Area;
use App\Models\Unit;
use App\Models\User;
use App\Models\Zone;
use App\Models\SubUnit;
use App\Models\Department;
use App\Models\Designation;
use App\Service\RoleService;
use App\Service\UserService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    protected $userService, $roleService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function index()
    {
        return view('administrative.user.index');
    }
    public function data()
    {
        return  $this->userService->getAllData();
    }
    public function create()
    {
        $roles = Role::all();
        return view('administrative.user.create', compact('roles'));
    }
    public function store(UserStoreRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'status' => 'required|string',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $input = $request->except('_token');

        $input['name'] = $request->name;
        $input['designation'] = $request->designation;
        $input['email'] = $request->email;
        $input['status'] = $request->status;
        $input['password'] = Hash::make($request->password);
        $input['email_verified_at'] = Carbon::now();

        $request = new Request($input);
        $user = User::create($input);
        $user->assignRole($request->input('role'));
        if ($user) {
            return redirect()->route('administrative.user')->with('success', 'User Created Successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Something Wrong,Please Try Again');
        }
    }
    public function edit($id)
    {
        $data =  $this->userService->findbyId($id);
        $role_name = $data->getRoleNames() ? $data->getRoleNames()->first() : '';
        $roles = Role::all();
        return view('administrative.user.edit', compact('data', 'role_name', 'roles'));
    }
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Exclude the current user's ID
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $input = $request->except('_token', 'password');
        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->password);
        }

        $input['status'] = $request->status;
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['designation'] = $request->designation;
        $user = User::find($id);
        $user->assignRole($request->input('role'));

        $user->update($input);
        if ($user) {
            return redirect()->route('administrative.user')->with('success', 'User Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Wrong,Please Try Again');
        }
    }
    public function destroy($id)
    {
        $result = $this->userService->destroy($id);
        if ($result) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

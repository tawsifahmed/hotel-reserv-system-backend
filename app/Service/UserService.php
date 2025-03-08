<?php

namespace App\Service;


use DataTables;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $userRepository;

    // Constructor to bind model to repo
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        return  $this->userRepository->all();
    }
    public function allAssociate(array $relation = [])
    {
        return  $this->userRepository->all($relation);
    }
    public function getAllData()
    {
        $data = $this->userRepository->all();
        $data = $data->where('email', '!=', 'platform.singularity@gmail.com');
        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                        $html = '';
                        if(Auth::user()->can('role_delete')){
                        $html .= '<a class="mr-3" href="' . route('administrative.user.edit', $row->id) . '" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                </a>';
                        }
                        if(Auth::user()->can('role_delete')){
                            $html .= '<a class="text-danger" href="#" onclick="deleteData('.$row->id.');">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-delete"><path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><line x1="18" y1="9" x2="12" y2="15"></line><line x1="12" y1="9" x2="18" y2="15"></line></svg>
                                    </a>';
                        }
                        return $html;
            })
            ->addColumn('role', function ($data) {
                $html = '<span class="badge bg-primary">' . optional($data->roles->first())->name . '</span> ';
                return $html;
            })
            ->editColumn('status', function ($data) {
                if ($data->status == 1) {
                    $html =  '<span class="badge bg-success">Active</span>';
                } else{
                    $html =  '<span class="badge bg-warning">Inactive</span>';
                }
                return $html;
            })
            ->rawColumns(['action', 'role', 'status'])
            ->blacklist(['created_at', 'updated_at', 'action'])
            ->addIndexColumn()
            ->toJson();
    }

    public function findbyId($id)
    {
        return $this->userRepository->show($id);
    }
    public function store($request)
    {
        return $this->userRepository->create($request->all());
    }
    public function update($id, $request)
    {
        return $this->userRepository->update($request->all(), $id);
    }
    public function findAssociate($id)
    {
        return $this->userRepository->findAssociate($id);
    }
    public function getUserByRoleFilter()
    {
        $relationFilter = ['roles' => [
            'filterColumn' => 'name',
            'filterCondition' => '=',
            'filterConditionValue' => 'Manager',
        ]];
        return $this->userRepository->allAssociateRelationFilter($relationFilter);
    }
    public function destroy($id)
    {
        return $this->userRepository->delete($id);
    }
}

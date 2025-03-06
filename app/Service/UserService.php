<?php

namespace App\Service;


use DataTables;
use App\Repositories\UserRepository;
use App\Models\Unit;
use App\Models\SubUnit;
use App\Models\Area;
use App\Models\Zone;
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
                $html .=  '<ul class="orderDatatable_actions mb-0 d-flex justify-content-start flex-wrap">';
                 if(Auth::user()->hasPermissionTo('update_user')){
                     $html .= '<li>
                        <a href="' . route('administrative.user.edit', $row->id) . '" class="edit">
                            <i class="uil uil-edit"></i>
                        </a>
                    </li>';
                 }
                if(Auth::user()->hasPermissionTo('delete_user')){
                    $html .= '<li>
                        <a href="#" onclick="deleteData(' . $row->id . ');" class="edit">
                              <i class="fas fa-trash-alt"></i>
                        </a>
                    </li>';
                }
                $html .= '</ul>';
                return $html;
            })
            ->editColumn('role', function ($row) {
                $roles = $row->getRoleNames()?$row->getRoleNames()[0]:'';
                return  $roles;
            })
            ->editColumn('status', function ($row) {
                $status = $row->status;
                $badgeClass = $status == "active" ? "badge-success" : "badge-danger";
                return  '<span class="text-capitalize badge ' . $badgeClass . '">' . $status . '</span> ';
            })
            ->rawColumns(['action','status','role'])
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

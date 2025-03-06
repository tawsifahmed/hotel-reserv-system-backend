<?php

namespace App\Service;


use DataTables;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Auth;

class RoleService
{
    protected $roleRepository;

    // Constructor to bind model to repo
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function all()
    {
        return  $this->roleRepository->all();
    }
    public function allAssociate(array $relation = [])
    {
        return  $this->roleRepository->all($relation);
    }
    public function getAllData()
    {
        $data = $this->roleRepository->all();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                $btn = '';
                if($data->name !== 'Superadmin'){
                    $btn .= '<ul class="orderDatatable_actions mb-0 d-flex justify-content-start flex-wrap">';
                    if(Auth::user()->hasPermissionTo('update_role')) {
                        $btn .= '<li>
                                <a href="' . route('administrative.role.edit', $data->id) . '" class="edit">
                                    <i class="uil uil-edit"></i>
                                </a>
                            </li>';
                    }
                    if(Auth::user()->hasPermissionTo('delete_role')) {
                        $btn .= '<li>
                                    <a href="#" onclick="deleteData(' . $data->id . ');" class="edit">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </li>';
                    }
                    $btn .= '</ul>';
                }
                return $btn;
            })
            ->addColumn('permission', function ($data) {
                $html = '';
                foreach ($data->permissions()->pluck('name') as $permission) {
                    $html .= '<span class="badge badge-primary">' . ucfirst(str_replace("_", " ", $permission)) . '</span> ';
                }
                return $html;
            })
            ->rawColumns(['action', 'permission', 'action'])
            ->blacklist(['created_at', 'updated_at', ])
            ->addIndexColumn()
            ->toJson();
    }
    public function findbyId($id)
    {
        return $this->roleRepository->show($id);
    }
    public function store($request)
    {
        return $this->roleRepository->create($request->all());
    }
    public function update($id, $request)
    {
        return $this->roleRepository->update($request->all(), $id);
    }
    public function findAssociate($id, array $relation)
    {
        return $this->roleRepository->findAssociate($id, $relation);
    }
    public function allAssociateFilter(array $relation = [], $filter = [], $condition = 'hard', $result = 'multiple')
    {
        return $this->roleRepository->allAssociateFilter($relation, $filter, $condition, $result);
    }
    public function allAssociateFilterPagignate(array $relation = [], $filter = [], $page = 1, $condition = 'hard')
    {
        return $this->roleRepository->allAssociateFilterPagignate($relation, $filter, $page, $condition);
    }
    public function destroy($id)
    {
        return $this->roleRepository->delete($id);
    }
}

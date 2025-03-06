<?php

namespace App\Service;


use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PermissionRepository;

class PermissionService
{
    protected $permissionRepository;

    // Constructor to bind model to repo
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function all()
    {
        return  $this->permissionRepository->all();
    }
    public function allAssociate(array $relation = [])
    {
        return  $this->permissionRepository->all($relation);
    }
    public function getAllData()
    {
        $data = $this->permissionRepository->all();
        return Datatables::of($data)
            ->editColumn('name', function ($data) {
                $html = ucfirst(str_replace("_", " ", $data->name));
                return $html;
            })
//            ->addColumn('action', function ($data) {
//                $btn = '<ul class="orderDatatable_actions mb-0 d-flex justify-content-start flex-wrap">
//
//                <li>
//                    <a href="' . route('administrative.permission.edit', $data->id) . '" class="edit">
//                        <i class="uil uil-edit"></i>
//                    </a>
//                </li>
//                <li>
//                    <a href="#" onclick="deleteData(' . $data->id . ');" class="edit">
//                        <i class="fas fa-trash-alt"></i>
//                    </a>
//                </li>
//
//            </ul>
//                ';
//                return $btn;
//            })

            ->rawColumns(['name', 'action'])
            ->blacklist(['created_at', 'updated_at', 'action'])
            ->addIndexColumn()
            ->toJson();
    }
    public function findbyId($id)
    {
        return $this->permissionRepository->show($id);
    }
    public function store($request)
    {
        return $this->permissionRepository->create($request->all());
    }
    public function update($id, $request)
    {
        return $this->permissionRepository->update($request->all(), $id);
    }
    public function findAssociate($id, array $relation)
    {
        return $this->permissionRepository->findAssociate($id, $relation);
    }
    public function allAssociateFilter(array $relation = [], $filter = [], $condition = 'hard', $result = 'multiple')
    {
        return $this->permissionRepository->allAssociateFilter($relation, $filter, $condition, $result);
    }
    public function allAssociateFilterPagignate(array $relation = [], $filter = [], $page = 1, $condition = 'hard')
    {
        return $this->permissionRepository->allAssociateFilterPagignate($relation, $filter, $page, $condition);
    }
    public function destroy($id)
    {
        return $this->permissionRepository->delete($id);
    }
}

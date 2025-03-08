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

    public function all(){
        return  $this->permissionRepository->all();
    }
    public function allAssociate(array $relation=[]){
        return  $this->permissionRepository->all($relation);
    }
    public function getAllData(){
        $data = $this->permissionRepository->all();
        return Datatables::of($data)
            ->editColumn('name',function($data){
                $html = ucfirst(str_replace("_"," ",$data->name));
                return $html;
            })
            ->addColumn('action', function ($row) {
                if(Auth::user()->can('permission_edit')){
                    return '<a href="'.route('administrative.permission.edit',$row->id).'" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                    </a>';
                }
            })
            ->addColumn('delete', function ($row) {
                if(Auth::user()->can('permission_delete')){
                    return '<a href="#" onclick="deleteData('.$row->id.');">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-delete"><path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><line x1="18" y1="9" x2="12" y2="15"></line><line x1="12" y1="9" x2="18" y2="15"></line></svg>
                    </a>';
                }
            })
            ->rawColumns(['name','action','delete'])
            ->blacklist(['created_at', 'updated_at','action'])
            ->addIndexColumn()
            ->toJson();
    }
    public function findbyId($id){
        return $this->permissionRepository->show($id);
    }
    public function store($request){
        return $this->permissionRepository->create($request->all());
    }
    public function update($id,$request){
        return $this->permissionRepository->update($request->all(),$id);
    }
    public function findAssociate($id,array $relation)
    {
        return $this->permissionRepository->findAssociate($id,$relation);
    }
    public function allAssociateFilter(array $relation=[],$filter = [],$condition='hard',$result = 'multiple'){
        return $this->permissionRepository->allAssociateFilter($relation,$filter,$condition,$result);
    }
    public function allAssociateFilterPagignate(array $relation=[],$filter = [],$page = 1,$condition='hard'){
        return $this->permissionRepository->allAssociateFilterPagignate($relation,$filter,$page,$condition);
    }
    public function destroy($id)
    {
        return $this->permissionRepository->delete($id);
    }
}

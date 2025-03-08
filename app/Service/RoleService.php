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

    public function all(){
        return  $this->roleRepository->all();
    }
    public function allAssociate(array $relation=[]){
        return  $this->roleRepository->all($relation);
    }
    public function getAllData(){
        $data = $this->roleRepository->all();
        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                $html = '';
                if(Auth::user()->can('role_edit')){
                    $html .= '<a href="'.route('administrative.role.edit',$row->id).'" >
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
            ->addColumn('permission', function($data){
                $html = '';
                foreach($data->permissions()->pluck('name') as $permission){
                    $html.= '<span class="badge bg-primary mb-1">'.ucfirst(str_replace("_"," ",$permission)).'</span> ';
                }
                return $html;
            })
            ->rawColumns(['action','permission','delete'])
            ->blacklist(['created_at', 'updated_at','action'])
            ->addIndexColumn()
            ->toJson();
    }
    public function findbyId($id){
        return $this->roleRepository->show($id);
    }
    public function store($request){
        return $this->roleRepository->create($request->all());
    }
    public function update($id,$request){
        return $this->roleRepository->update($request->all(),$id);
    }
    public function findAssociate($id,array $relation)
    {
        return $this->roleRepository->findAssociate($id,$relation);
    }
    public function allAssociateFilter(array $relation=[],$filter = [],$condition='hard',$result = 'multiple'){
        return $this->roleRepository->allAssociateFilter($relation,$filter,$condition,$result);
    }
    public function allAssociateFilterPagignate(array $relation=[],$filter = [],$page = 1,$condition='hard'){
        return $this->roleRepository->allAssociateFilterPagignate($relation,$filter,$page,$condition);
    }
    public function destroy($id)
    {
        return $this->roleRepository->delete($id);
    }
}

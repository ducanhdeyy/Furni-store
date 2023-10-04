<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $permission;
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }
    public function index()
    {
        //
        $permissions = $this->permission->where('parent_id', 0)->paginate(1);
        return view('admin.permission.index',[
            'model' => 'permission',
            'title' => 'permission',
            'permissions'=>$permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.permission.add',[
            'model'=>'permission',
            'title'=>'Permission'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions'
        ]);
        try {
            $permissionId = $this->permission->insertGetId([
                'name' => $request->name,
                'parent_id' => 0
            ]);
            foreach ($request->module_child as $value) {
                $this->permission->create([
                    'name' => $value,
                    'key_code' => $value,
                    'parent_id' => $permissionId
                ]);
            }
            return redirect()->back()->with('success', 'Tạo Mới Thành Công');
        } catch (\Exception $err) {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

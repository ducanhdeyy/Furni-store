<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $userRepo;
    public function __construct(UserRepositoryInterface $userRepo) {
        $this->userRepo = $userRepo;
    }
    public function index()
    {
        //
        $users = $this->userRepo->getUser();
        return view('admin.user.index',[
            'model'=>'user',
            'title'=>'User',
            'users'=>$users
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
        $roles = $this->userRepo->getRole();
        return view('admin.user.add',[
            'model'=>'user',
            'title'=>'User',
            'roles'=>$roles
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
        //
        return $this->userRepo->store($request);
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
        $user = $this->userRepo->find($id);
        return view('admin.user.show',[
            'model'=>'user',
            'title'=>'User',
            'user'=>$user
        ]);
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
        $roles = $this->userRepo->getRole();
        $user = $this->userRepo->find($id);
        return view('admin.user.edit',[
            'model'=>'user',
            'title'=>'User',
            'user'=>$user,
            'roles'=>$roles
        ]);
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
        return $this->userRepo->edit($id,$request);
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
        if($this->userRepo->delete($id)){
            return redirect()->back()->with('success','Xóa thành công');
        }
    }
}

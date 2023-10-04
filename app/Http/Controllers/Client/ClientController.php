<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Models\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function index(){
        return view('client.signIn');
    }

    public function create(){
        return view('client.signUp');
    }
    public function signIn(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('cus')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            return redirect()->route('home');
        }
        return redirect()->back()->with('error', 'Email Or Password wrong');
    }

    public function store(SignUpRequest $request){
        DB::beginTransaction();
        // dd($request->all());
        try {
            $linkImage = '';
            $users = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
            ];

            if ($request->hasFile('path_image')) {
                upload_img('users', $request);
                $linkImage = $request->input('path_image');
                $users['path_image'] = $linkImage;
            }
            $user =  Customer::create($users);
            if (!empty($request->roles)){
                $user->roles()->attach($request->roles);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Tạo mới tài khoản thành công');
        } catch (\Exception $err) {
            DB::rollBack();
            File::delete(public_path($linkImage));
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            return redirect()->back()->with('error', 'Tạo mới tài khoản thất bại');
        }
    }
    public function logout(){
        Auth::guard('cus')->logout();
        Cart::destroy();
        return redirect()->route('client_signIn');
    }
}

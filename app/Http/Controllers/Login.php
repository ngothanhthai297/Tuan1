<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Login extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function userLogout()
    {
        Auth::logout();
        return back();
    }
    public function userRegister()
    {
        return view('register');
    }
    //Xu ly du lieu register
    //Xu ly du lieu register
    public function userRegisterSubmit(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'string|required|min:2',
            'email' => 'string|required|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        // dd($data);
        $status = User::create($data);
        if ($status) {
            return redirect('/login');
        } else {
            echo "Đăng kí không thành công";
        }
        // // dd($check);
       
    }
    public function userLoginSubmit(Request $request)
    {
        $data = $request->all();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {          
            echo "Dang nhap thanh cong <br>";
            echo "<a href = http://localhost/TT_Tuan1/public/logout>Logout</a>";
           
        } else {
            return back();
        }
    }
    public function userLogin()
    {
        return view('login');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

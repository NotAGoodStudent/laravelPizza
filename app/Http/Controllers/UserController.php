<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        $users = User::all();
        if(count($users)>0)
        {
            foreach ($users as $u)
            {

                if($u->email == request('email'))
                {
                    if($u->password == request('password'))
                    {
                        return view("users.register")->with('name', $u->name)->with('role', $u->role);
                    }
                    return view("users.login")-> with('wrongCred', "wrong credentials introduced")-> with('isFromLogin', true);
                }
            }
        }
        return view("users.login")-> with('wrongCred', "wrong credentials introduced")-> with('isFromLogin', true);;
    }
}

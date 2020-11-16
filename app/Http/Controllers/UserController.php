<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        session()->forget('user');
        session()->forget('cameFromController');
        $users = User::all();
        if(count($users)>0)
        {
            foreach ($users as $u)
            {

                if($u->email == request('email'))
                {
                    if($u->password == request('password'))
                    {
                        session(['user' => $u]);
                        return redirect('/logged');

                    }


                    session(['cameFromController' => true]);
                    return redirect('/');


                }
            }
        }
        session(['cameFromController' => true]);
        return redirect('/');
    }

}

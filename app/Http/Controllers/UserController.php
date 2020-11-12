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
                        return redirect('/')->with('success', 'Welcome '. $u->name .'!'. ' Role: '. $u->role);

                    }

                    return redirect('/')->with('failed', 'wrong credentials introduced!');


                }
            }
        }
        return redirect('/')->with('failed', 'wrong credentials introduced!');
    }
}

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
                if($u->username == request('username'))
                {
                    if($u->password == request('password'))
                    {
                        session(['currentUser' => $u]);
                        return view("users.menu")->with('name', $u->username);
                    }
                    return view("users.login")-> with('wrongCred', "wrong credentials introduced")-> with('isFromLogin', true);
                }
            }
        }
        return view("users.login")-> with('wrongCred', "wrong credentials introduced")-> with('isFromLogin', true);;
    }

    public function addUser()
    {
        $users = User::all();

        foreach ($users as $u)
        {
            if($u->username == request('username') || $u->email == request('enail'))
            {
                return view('users.register')->with('recordExists', true);
            }

        }

        if(request('password') == request('password2'))
        {
            $u = $this->addUserData(request('email'), request('username'), request('name'), request('surname'), request('password'), 'Client');
            $u->save();
            return view('users.register');
        }
    }

    public function addUserData($email, $username, $name, $surname, $password, $role)
    {
        $u = new User();
        $u->email = $email;
        $u->username = $username;
        $u->name = $name;
        $u->surname = $surname;
        $u->password = $password;
        $u->role = $role;
        $u->creationDate = date('Y/m/d');
        return $u;

    }
}

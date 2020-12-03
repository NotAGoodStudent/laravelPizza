<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;

class UserController extends Controller
{
    /**
     * Recovers all the field from the post and and checks if the credentials coincide with the data in the database
     */
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

    /**
     * calls the function validateCredentials and depending on what it returns we either return errors or add the users to the database
     */
    public function addUser()
    {
        $added = $this->validateCredentials();
        $users = $this->getAllUsers();
        if($added == 0) return view('users.register')->with('users', $users)->with('rightCred', 'User added successfully')->with('added', true);
        if($added == 1) return view('users.register')->with('users', $users)->with('wrongCred', 'Username or Email in use')->with('recordExists', true);
        if($added == 2) return view('users.register')->with('users', $users)->with('wrongCred', 'Passwords do not coincide')->with('notEqual', true);
    }

    /**
     *checks if the username and email already exist in the database and it also checks if the passwords wether coincide or not, depending on the condition
     *that is given will return a number that will be processed in the function addUser
     */
    public function validateCredentials()
    {
        $users = $this->getAllUsers();
        foreach ($users as $u)
        {
            if($u->username == request('username') || $u->email == request('email')) return 1;
        }
        if(request('password') == request('password2'))
        {
            $u = $this->addUserData(request('email'), request('username'), request('name'), request('surname'), request('password'), 'Client');
            $u->save();
            $curr = session('currentUser');
            return 0;
        }
        return 2;
    }

    /**
     * @param $email
     * @param $username
     * @param $name
     * @param $surname
     * @param $password
     * @param $role
     * @return User
     */
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

    /**
     * gets all users from the database except the current one
      */
    public function getAllUsers()
    {
        $curr = session('currentUser');
        $users = User::all();
        foreach ($users as $key => $u)
        {
            if($curr->username == $u->username)
            {
                $users->forget($key);
            }
        }
        return $users;
    }

    /**
     * returns the necessary data to load users.register.blade
     * */
    public function returnRegister()
    {
        $users = $this->getAllUsers();
        return view('users.register')->with('users', $users);
    }
}

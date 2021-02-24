<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillLine;
use App\User;
use App\Pizza;
use http\Env\Request;

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
        $users = $this->getAllUsers(true);
        if($added == 0) return view('users.register')->with('users', $users)->with('rightCred', 'User added successfully')->with('added', true);
        if($added == 1) return view('users.register')->with('users', $users)->with('wrongCred', 'Username or Email in use')->with('recordExists', true);
        if($added == 2) return view('users.register')->with('users', $users)->with('wrongCred', 'Passwords do not coincide')->with('notEqual', true);
        if($added == 3) return view('users.register')->with('users', $users)->with('wrongCred', 'Some fields are empty')->with('roleNull', true);
    }

    /**
     *checks if the username and email already exist in the database, if the role has no value and it also checks whether or not they passwords coincide, depending on the condition
     *that is given will return a number that will be processed in the function addUser
     */
    public function validateCredentials()
    {

        $validated = request()->validate([
            'email'=> 'required|min:5',
            'username'=> 'required|min:3',
            'name' => 'required|min:2',
            'surname' => 'required|min:3',
            'password' => 'required|min:3',
            'password2' => 'required|min:3',
            'role' => 'required'
        ]);
        if($validated) {
            $users = $this->getAllUsers(false);

            foreach ($users as $u) {
                if ($u->username == request('username') || $u->email == request('email')) return 1;
            }

            if (request('password') == request('password2')) {
                $u = $this->addUserData(request('email'), request('username'), request('name'), request('surname'), request('password'), request('role'));
                $u->save();
                return 0;
            }
            return 2;
        }
        return 3;
    }

    /**
        The variable names given are User class variables, this function takes those fields and creates a new user that will be returned and assigned
     */
    /**
     * @param $email //contains an email that we get from the form input
     * @param $username //contains a username that we get from the form input
     * @param $name //contains a name that we get from the form input
     * @param $surname //contains a surname that we get from the form input
     * @param $password //contains a password that we get from the form input
     * @param $role //gets the role that we assigned
     * @return User // We return a User object that will be created with the parameters mentioned above and a creationDate variable that will contain today's date
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
        $u->creationDate = date("Y/m/d H:i:s", strtotime('1 hour'));
        return $u;
    }

    /**
     * gets all users from the database except the current one i the passed value is true, it'll order the records by surname from A-Z
      */
    public function getAllUsers($order)
    {
        $curr = session('currentUser');
        if(!$order)
        {
            $users = User::all();
            foreach ($users as $key => $u) {
                if ($curr->username == $u->username) {
                    $users->forget($key);
                }
            }
            return $users;
        }
        $users = User::orderBy('surname')->get();
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
        $users = $this->getAllUsers(true);
        return view('users.register')->with('users', $users);
    }

    public function returnOrderPizza()
    {
        $pizzaCont = new PizzaController();
        $pizzas = $pizzaCont->getAllPizzas(true);
        return view('users.order')->with('pizzas', $pizzas);
    }


    public function savePizzasForConfirmationView()
    {
        $pizzaCont = new PizzaController();
        $pizzas = $pizzaCont->getAllPizzas(true);
        $bills = Bill::all();
        if(count($bills) == 0)
        {

            $bill = new Bill();
            $bill->userID = session('currentUser')['usersID'];
            $bill->finalPrice = 0;
            $bill->paid = false;
            $bill->status = 'Pending';
            $bill->creationDate = date("Y/m/d H:i:s", strtotime('1 hour'));
            $bill->save();
        }
        else {
            $rightBill = 0;
            foreach ($bills as $b) {
                if (!$b->paid && $b->userID == session('currentUser')['usersID']) {
                    $rightBill = $b->billID;
                    break;
                }
            }

            if($rightBill == 0)
            {
                $rightB = 0;
                $bill = new Bill();
                $bill->userID = session('currentUser')['usersID'];
                $bill->finalPrice = 0;
                $bill->paid = false;
                $bill->status = 'Pending';
                $bill->creationDate = date("Y/m/d H:i:s", strtotime('1 hour'));
                $bill->save();
                $bills = Bill::all();
                foreach ($bills as $b) {
                    if (!$b->paid && $b->userID == session('currentUser')['usersID']) {
                        $rightB = $b->billID;
                        break;
                    }
                }
                $billLine = new BillLine();
                $billLine->billID = $rightB;
                $billLine->pizzaID = request('submitButton');
                $billLine->quantity = request('quantity');
                $billLine->creationDate = date("Y/m/d H:i:s", strtotime('1 hour'));
                $billLine->save();
            }
            else
                {
                    $billLine = new BillLine();
                    $billLine->billID = $rightBill;
                    $billLine->pizzaID = request('submitButton');
                    $billLine->quantity = request('quantity');
                    $billLine->creationDate = date("Y/m/d H:i:s", strtotime('1 hour'));
                    $billLine->save();
                }

        }
        return view('users.order')->with('pizzas', $pizzas);
    }

    public function returnConfirmationView()
    {
        $bills = Bill::all();
        $pizzaCont = new PizzaController();
        $pizzas = $pizzaCont->getAllPizzas(true);
        $billLines = BillLine::all();
        $rightBill = 0;
        foreach ($bills as $b) {
            if (!$b->paid && $b->userID == session('currentUser')['usersID']) {
                $rightBill = $b->billID;
                break;
            }
        }
         $products = array();
        foreach ($billLines as $b)
        {
            if($b->billID == $rightBill)
            {
                array_push($products, $b);
            }
        }
        return view('users.confirm')->with('boughtPizzas', $products)->with('pizzas', $pizzas);
    }

    public function cancelBill()
    {
        $bills = Bill::all();
        $billL = BillLine::all();
        $rightBill = 0;
        foreach ($bills as $b) {
            if (!$b->paid && $b->userID == session('currentUser')['usersID']) {
                $rightBill = $b->billID;
                $b->delete();
                break;
            }
        }
        if($rightBill != 0)
        {
            foreach ($billL as $bl)
            {
                if($bl->billID == $rightBill)
                {
                    $bl->delete();
                }
            }
        }
        $pizzaCont = new PizzaController();
        $pizzas = $pizzaCont->getAllPizzas(true);
        return view('users.order')->with('pizzas', $pizzas);
    }

    public function payBill()
    {
        $bills = Bill::all();
        $billL = BillLine::all();
        $pizzaCont = new PizzaController();
        $pizzas = $pizzaCont->getAllPizzas(true);
        $rightBill = null;
        foreach ($bills as $b) {
            if (!$b->paid && $b->userID == session('currentUser')['usersID']) {
                $rightBill = $b;
                break;
            }
        }
        if(!is_null($rightBill))
        {
            $finalprice = 0;
            foreach ($billL as $bl)
            {
                if($bl->billID == $rightBill->billID)
                {
                    foreach ($pizzas as $p)
                    {
                        if($p->pizzaID == $bl->pizzaID)
                        {
                            $finalprice += $bl->quantity * $p->price;
                            break;
                        }
                    }
                }
            }

            $rightBill->paid = true;
            $rightBill->finalPrice = $finalprice;
            $rightBill->status = 'Preparing';
            $rightBill->update();
        }

        $pizzaCont = new PizzaController();
        $pizzas = $pizzaCont->getAllPizzas(true);
        return view('users.order')->with('pizzas', $pizzas);
    }

    public function logout()
    {
        session(['currentUser' => null]);
        return view('users.login');
    }
}

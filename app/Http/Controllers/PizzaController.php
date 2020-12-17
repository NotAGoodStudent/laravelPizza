<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{

    public function addPizza()
    {
        $added = $this->validateCredentials();
        $pizzas = $this->getAllPizzas(true);
        if($added == 0) return view('pizzas.createPizza')->with('pizzas', $pizzas)->with('noErrors', 'Pizza cereated')->with('added', true);
        if($added == 1 ) return view('pizzas.createPizza')->with('pizzas', $pizzas)->with('Error', 'Fields are empty')->with('added', false);
    }

    public function validateCredentials()
    {
       /* $validate = request()->validate([
           'type' => 'required|unique|min:3',
            'crust' => 'required',
            'price' => 'required'

        ]);
        if($validate)
        {*/
            $p = $this->addPizzaData(request('type'), request('crust'), request('price'));
            $p->save();
            return 0;
  /*      }
        return 1;*/

    }

    public function addPizzaData($type, $crust, $price)
    {
        $pizza = new Pizza();
        $pizza->type = $type;
        $pizza->crust = $crust;
        $pizza->price = $price;
        $pizza->creationDate = date("Y/m/d H:i:s", strtotime('1 hour'));
        return $pizza;
    }

    /**
     * This function returns all the pizza records on the database, it takes a parameter called order which is a boolean that if it's set to true
     * it'll get the pizza records ordered by the field 'type' in an ascendant way, from A-Z, if the parameter is set to false, it'll return the
     * values without being order, meaning that it'll basically return the values in the same order they're in the database.
     */
    public function getAllPizzas($order)
    {
        if(!$order)
        {
            $pizzas = Pizza::all();
            return $pizzas;
        }
        else
        {
            $pizzas = Pizza::orderBy('type')->get();
            return $pizzas;
        }
    }

    /**
     * When called return the view where we can create and see the pizzas we have in the database
     */
    public function returnCreatePizza()
    {
        $pizzas = $this->getAllPizzas(true);
        return view('pizzas.createPizza')->with('pizzas', $pizzas);
    }
}

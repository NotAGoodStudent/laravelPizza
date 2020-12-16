<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{

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

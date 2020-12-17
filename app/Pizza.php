<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    /**
     * When you add data to the database, if you don't have this it'll ask for a created:at and updated_at variables
     */
    public $timestamps = false;
    //
}

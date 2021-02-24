<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillLine extends Model
{
    public $timestamps = false;
    public $table = "bill_line";
    public $primaryKey = 'billLineID';
    //
}

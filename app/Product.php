<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function timesheet() {
        return $this->hasOne('App\Timesheet');
    }
}
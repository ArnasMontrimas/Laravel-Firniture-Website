<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function address() {
        return $this->belongsTo("App\Address");
    }

}

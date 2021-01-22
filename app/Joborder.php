<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joborder extends Model
{
    protected $table = 'joborders';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function timesheet() {
        return $this->hasOne('App\Timesheet');
    }

}

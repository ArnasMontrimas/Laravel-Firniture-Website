<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    protected $table = 'timesheets';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function employee() {
        return $this->belongsTo('App\Employee');
    }

    public function joborder() {
        return $this->belongsTo('App\Joborder');
    }
}

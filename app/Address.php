<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function employee() {
        return $this->hasOne("App\Employee");
    }
}

<?php

namespace App\Http\Models;

use marcusvbda\vstack\Models\DefaultModel;

class Gender extends DefaultModel
{
    protected $table = "genders";
    // public $cascadeDeletes = [];
    // public $restrictDeletes = [];

    public function tenant()
    {
        return $this->belongsTo(\App\Http\Models\Tenant::class);
    }
}

<?php

namespace App\Models;

use App\AbstractBases\AbstractBaseModel;

class Promotion extends AbstractBaseModel
{
    protected $table = 'promotions';

    protected $fillable = [
        'uuid',
        'client_slug',
        'required_fields',
        'mechanics_type',
        "time",
        "probability"
    ];


}
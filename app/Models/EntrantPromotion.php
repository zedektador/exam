<?php

namespace App\Models;

use App\AbstractBases\AbstractBaseModel;

class EntrantPromotion extends AbstractBaseModel
{
    protected $table = 'entrant_promotions';

    protected $fillable = [
        'email',
        'promotion_id',
        'entrant_fields',
        'winner',
        "created_at"
    ];

    protected $casts = [
        'winner' => 'boolean'
    ];
}
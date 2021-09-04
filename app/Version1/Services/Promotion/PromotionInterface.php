<?php

namespace App\Version1\Services\Promotion;

use Illuminate\Http\Request;

interface PromotionInterface {

    public function create(Request $request);

    public function findOrFail($uuid, $mechanics_type);
}

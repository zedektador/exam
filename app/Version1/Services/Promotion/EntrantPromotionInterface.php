<?php

namespace App\Version1\Services\Promotion;

use Illuminate\Http\Request;

interface EntrantPromotionInterface {

    public function saveEntrants($promotion,Request $request);
}

<?php

namespace App\Version1\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Version1\Services\Promotion\PromotionService;
use Illuminate\Http\Request;

class PromotionController extends Controller {

    protected $service;

    public function __construct(PromotionService $service) {
        $this->service = $service;
    }

    public function add(Request $request) {
        $this->validate($request, [
            "client_slug" => "required",
            "required_fields" => "required|array",
            "mechanics_type" => "required",
            "time" => "required_if:mechanics_type,winning",
            "probability" => "required_if:mechanics_type,chance"
        ]);

        $response = $this->service->create($request);

        return response()->json(
            $response, $response->status
        );
    }
}

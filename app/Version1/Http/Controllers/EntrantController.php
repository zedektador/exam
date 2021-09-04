<?php

namespace App\Version1\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Version1\Services\Promotion\EntrantPromotionService;
use App\Version1\Services\Promotion\PromotionService;
use Illuminate\Http\Request;

class EntrantController extends Controller {

    protected $service;
    protected $promotionService;

    public function __construct(EntrantPromotionService $entrantPromotionService, PromotionService $promotionService) {
        $this->service = $entrantPromotionService;
        $this->promotionService = $promotionService;
    }

    public function winning(Request $request, $promotion_uuid) {
        $promotion = $this->promotionService->findOrFail($promotion_uuid, 'winning');
        if($promotion->status == 404) {
            return response()->json(
                $promotion, $promotion->status
            );
        }
        $this->validate($request, $this->getRequiredFields($promotion));

        $response = $this->service->saveEntrants($promotion, $request);

        return response()->json(
            $response, $response->status
        );
    }
    public function chance(Request $request, $promotion_uuid) {
        $promotion = $this->promotionService->findOrFail($promotion_uuid, 'chance');
        if($promotion->status == 404) {
            return response()->json(
                $promotion, $promotion->status
            );
        }
        $this->validate($request, $this->getRequiredFields($promotion));

        $response = $this->service->saveEntrants($promotion, $request);

        return response()->json(
            $response, $response->status
        );
    }

    protected function getRequiredFields($promotion) {
        $requiredFields = json_decode($promotion['required_fields']);
        $array = [];
        foreach($requiredFields as $fields) {
            $array[$fields] = 'required';
        }
        return $array;
    }
}

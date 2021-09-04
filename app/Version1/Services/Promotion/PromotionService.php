<?php

namespace App\Version1\Services\Promotion;

use App\Version1\Repositories\PromotionRepository;
use Ramsey\Uuid\Uuid;
use App\AbstractBases\AbstractBaseService;

use Illuminate\Http\Request;

class PromotionService extends AbstractBaseService implements PromotionInterface {

    protected $module = 'promotion';
    protected $version = 'v1';
    protected $repository;
    const OBJECTNAME = "promotion";

    public function __construct(Request $request, PromotionRepository $repository) {

        $this->repository = $repository;
        parent::__construct($request);
    }


    public function create(Request $request)
    {
        $create = $this->repository->create([
            "uuid" => Uuid::uuid4()->toString(),
            "client_slug" => $request->client_slug,
            "required_fields" => json_encode($request->required_fields),
            "mechanics_type" => $request->mechanics_type,
            "time" => $request->mechanics_type == "winning" ? date("H:i", strtotime($request->time)) : null,
            "probability" => $request->mechanics_type == "chance" ? $request->probability : null
        ]);
        $this->response = $this->makeResponse(200, 'add.200');
        return $this->with([
            static::OBJECTNAME => $create
        ])->response();
    }

    public function findOrFail($uuid, $mechanics_type) {
        $promotion = $this->repository->view($uuid, $mechanics_type);
        if($promotion == null){
            $this->response = $this->makeResponse(404, '404');
            return $this->response();
        }
        return $promotion;
    }
}

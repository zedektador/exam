<?php

namespace App\Version1\Repositories;

use App\AbstractBases\AbstractBaseRepository;
use App\Models\Promotion;

class PromotionRepository extends AbstractBaseRepository {

    public function __construct(Promotion $model) {
        parent::__construct($model);
    }

    public function view($uuid, $mechanics_type) {
        return $this->model->where('uuid',$uuid)
            ->where('mechanics_type', $mechanics_type)
            ->first();
    }
}

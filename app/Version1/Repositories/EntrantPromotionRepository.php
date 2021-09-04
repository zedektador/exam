<?php

namespace App\Version1\Repositories;

use App\AbstractBases\AbstractBaseRepository;
use App\Models\EntrantPromotion;

class EntrantPromotionRepository extends AbstractBaseRepository {

    public function __construct(EntrantPromotion $model) {
        parent::__construct($model);
    }

    public function countEntrants($promotion_id, $limit_id) {
        return $this->model->where('id', '<=', $limit_id)
            ->where('promotion_id', $promotion_id)
            ->count();
    }
}

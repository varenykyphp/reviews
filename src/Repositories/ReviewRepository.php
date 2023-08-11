<?php

namespace VarenykyReview\Repositories;

use Varenyky\Repositories\Repository;
use VarenykyReview\Models\Review;

class ReviewRepository extends Repository
{
    /**
     * To initialize class objects/variable.
     */
    public function __construct(Review $model)
    {
        $this->model = $model;
    }
}

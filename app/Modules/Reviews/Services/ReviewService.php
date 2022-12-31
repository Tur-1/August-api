<?php

namespace App\Modules\Reviews\Services;

use App\Modules\Reviews\Repository\ReviewRepository;

class ReviewService
{
    private $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }
    public function getAll($records = 12)
    {
        return $this->reviewRepository->getAll($records);
    }
    public function createReview($comment, $product_id)
    {
        return $this->reviewRepository->createReview($comment, $product_id);
    }
    public function showReview($id)
    {
        return $this->reviewRepository->getReview($id);
    }
    public function updateReview($validatedRequest, $id)
    {
        return $this->reviewRepository->updateReview($validatedRequest, $id);
    }
    public function deleteReview($id)
    {
        return $this->reviewRepository->deleteReview($id);
    }
}
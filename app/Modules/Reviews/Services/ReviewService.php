<?php

namespace App\Modules\Reviews\Services;

use App\Modules\Reviews\Repository\ReviewRepository;
use App\Modules\Reviews\Resources\ReviewResource;

class ReviewService
{
    private $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }
    public function getAll($records = 12)
    {
        return ReviewResource::collection($this->reviewRepository->getAll($records));
    }
    public function createReview($comment, $product_id)
    {
        return $this->reviewRepository->createReview($comment, $product_id);
    }
    public function replyReview($comment, $review_id)
    {
        return $this->reviewRepository->replyReview($comment, $review_id);
    }
    public function showReview($id)
    {
        return ReviewResource::make($this->reviewRepository->getReview($id));
    }
    public function updateReview($comment, $id)
    {
        return $this->reviewRepository->updateReview($comment, $id);
    }
    public function deleteReview($id)
    {
        return $this->reviewRepository->deleteReview($id);
    }
}
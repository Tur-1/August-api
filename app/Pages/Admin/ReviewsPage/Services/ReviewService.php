<?php

namespace App\Pages\Admin\ReviewsPage\Services;

use App\Modules\Reviews\Repository\ReviewRepository;
use App\Pages\Admin\ReviewsPage\Resources\ReviewResource;
use App\Pages\Admin\ReviewsPage\Resources\ReviewsListResource;

class ReviewService
{
    private $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }
    public function getAll()
    {
        return ReviewsListResource::collection($this->reviewRepository->getAll());
    }

    public function replyReview($comment, $review_id)
    {
        return ReviewResource::make($this->reviewRepository->replyReview($comment, $review_id));
    }
    public function showReview($id)
    {
        return ReviewResource::make($this->reviewRepository->getReview($id));
    }

    public function deleteReview($id)
    {
        return $this->reviewRepository->deleteReview($id);
    }
}

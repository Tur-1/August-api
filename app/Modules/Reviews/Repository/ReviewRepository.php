<?php

namespace App\Modules\Reviews\Repository;

use Carbon\Carbon;
use App\Modules\Reviews\Models\Review;
use App\Exceptions\PageNotFoundException;

class ReviewRepository
{
    private $review;

    public function __construct()
    {

        $this->review = new Review();
    }
    public function getAll()
    {
        return $this->review
            ->with('user', 'product')
            ->whereNull('review_id')
            ->latest()
            ->paginate(20);
    }
    public function getProductReviews($productId)
    {
        return $this->review->where('product_id', $productId)
            ->whereNull('review_id')
            ->with('user', 'reply')
            ->select('id', 'comment', 'user_id', 'product_id', 'created_at', 'review_id','admin_id')
            ->latest()
            ->get();
    }

    public function replyReview($comment, $review_id)
    {
        $currentDate = Carbon::now('GMT+3');

        $review = $this->getReview($review_id);

        if (!is_null($review->reply)) {
            $review->reply()->update([
                'comment' => $comment,
            ]);
        } else {
            $review->reply()->create([
                'user_id' => $review->user_id,
                'admin_id' => auth()->guard('admin')->id(),
                'product_id' => $review->product_id,
                'comment' => $comment,
                'create_at' =>  $currentDate,
            ]);
        }
        $review->load('reply');
        return $review;
    }

    public function getReview($id)
    {
        $this->review = $this->review->with('reply', 'user')->find($id);
        if (is_null($this->review)) {
            throw new PageNotFoundException();
        }

        return $this->review;
    }
    public function createReview($comment, $product_id)
    {
        $currentDate = Carbon::now('GMT+3');

        return $this->review->create([
            'user_id' => auth()->guard('web')->id(),
            'product_id' => $product_id,
            'comment' => $comment,
            'create_at' =>  $currentDate,

        ]);
    }
    public function updateReview($comment, $id)
    {
        $currentDate = Carbon::now('GMT+3');
        $review = $this->getReview($id);
        $review->update([
            'comment' => $comment,
            'create_at' =>  $currentDate,
        ]);
        return  $review;
    }
    public function deleteReview($id)
    {
        return $this->review->where('id', $id)->delete();
    }
}

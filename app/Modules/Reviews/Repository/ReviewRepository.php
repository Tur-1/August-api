<?php

namespace App\Modules\Reviews\Repository;

use App\Modules\Reviews\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

class ReviewRepository
{
    private $review;

    public function __construct()
    {

        $this->review = new Review();
    }
    public function getAll($records)
    {
        return $this->review->paginate($records);
    }
    public function createReview($comment, $product_id)
    {
        $currentDate = Carbon::now('GMT+3');

        return $this->review->create([
            'user_id' => auth()->id(),
            'product_id' => $product_id,
            'comment' => $comment,
            'create_at' =>  $currentDate
        ]);
    }
    public function getReview($id)
    {
        return $this->review->find($id);
    }
    public function updateReview($validatedRequest, $id)
    {
        $review = $this->getReview($id);
        $review->update($validatedRequest);
        return  $review;
    }
    public function deleteReview($id)
    {
        return $this->review->where('id', $id)->delete();
    }
}
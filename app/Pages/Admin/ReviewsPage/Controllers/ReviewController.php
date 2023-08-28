<?php

namespace App\Pages\Admin\ReviewsPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Admin\ReviewsPage\Services\ReviewService;
use App\Pages\Admin\ReviewsPage\Requests\StoreReviewRequest;

class ReviewController extends Controller
{


    private $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }


    public function index(Request $request)
    {
        $this->userCan('access-reviews');

        return  $this->reviewService->getAll();
    }



    public function replyReview(StoreReviewRequest $request, $review_id)
    {
        $request->validated();

        $review =  $this->reviewService->replyReview($request->comment, $review_id);

        return response()->success([
            'message' => 'Review has been created successfully',
            'review' => $review,

        ]);
    }

    public function showReview($id)
    {
        $this->userCan('view-reviews');

        try {
            $review =  $this->reviewService->showReview($id);
            return response()->success([
                'review' => $review
            ]);
        } catch (\Exception $ex) {
            return response()->error([], 404);
        }
    }


    public function destroyReview($id)
    {
        $this->userCan('delete-reviews');

        $this->reviewService->deleteReview($id);

        return response()->success([
            'message' => 'Review has been deleted successfully',
        ]);
    }
}

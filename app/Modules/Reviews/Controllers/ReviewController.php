<?php

namespace App\Modules\Reviews\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Reviews\Requests\StoreReviewRequest;
use App\Modules\Reviews\Requests\UpdateReviewRequest;
use App\Modules\Reviews\Services\ReviewService;


class ReviewController extends Controller
{


    private $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }


    public function index(Request $request)
    {
        return  $this->reviewService->getAll();
    }


    public function storeReview(Request $request)
    {


        // $this->reviewService->createReview($validatedRequest);

        return response()->success([
            'message' => 'Review has been created successfully'
        ]);
    }
    public function replyReview(Request $request, $review_id)
    {
        $review =  $this->reviewService->replyReview($request->comment, $review_id);

        return response()->success([
            'message' => 'Review has been created successfully',
            'review' => $review,

        ]);
    }

    public function showReview($id)
    {
        $review =  $this->reviewService->showReview($id);

        return response()->success([
            'review' => $review
        ]);
    }


    public function updateReview(Request $request, $id)
    {


        $review =  $this->reviewService->updateReview($request->comment, $id);

        return response()->success([
            'message' => 'Review has been updated successfully',
            'review' => $review,
        ]);
    }


    public function destroyReview($id)
    {

        $this->reviewService->deleteReview($id);

        return response()->success([
            'message' => 'Review has been deleted successfully',
        ]);
    }
}
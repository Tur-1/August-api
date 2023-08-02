<?php

namespace App\Pages\Admin\CouponsPage\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pages\Admin\CouponsPage\Requests\StoreCouponRequest;
use App\Pages\Admin\CouponsPage\Requests\UpdateCouponRequest;
use App\Pages\Admin\CouponsPage\Services\CouponService;

class CouponController extends Controller
{
    private $couponService;

    public function __construct(CouponService $couponService)
    {
        $this->couponService = $couponService;
    }

    public function index(Request $request)
    {
        return $this->couponService->getAll($request->records);
    }

    public function storeCoupon(StoreCouponRequest $request)
    {
        $validatedRequest = $request->validated();

        $this->couponService->createCoupon($validatedRequest);

        return response()->success([
            'message' => 'Coupon has been created successfully',
        ]);
    }

    public function showCoupon($id)
    {
        $coupon = $this->couponService->showCoupon($id);

        return response()->success([
            'coupon' => $coupon,
        ]);
    }

    public function updateCoupon(UpdateCouponRequest $request, $id)
    {
        $validatedRequest = $request->validated();

        $coupon = $this->couponService->updateCoupon($validatedRequest, $id);

        return response()->success([
            'message' => 'Coupon has been updated successfully',
            'coupon' => $coupon,
        ]);
    }

    public function destroyCoupon($id)
    {
        $this->couponService->deleteCoupon($id);

        return response()->success([
            'message' => 'Coupon has been deleted successfully',
        ]);
    }
}
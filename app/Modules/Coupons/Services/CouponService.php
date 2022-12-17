<?php

namespace App\Modules\Coupons\Services;

use App\Modules\Coupons\Repository\CouponRepository;
use App\Modules\Coupons\Resources\CouponResource;

class CouponService
{
    private $couponRepository;

    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    public function getAll($records = 12)
    {
        return CouponResource::collection($this->couponRepository->getAll($records));
    }

    public function createCoupon($validatedRequest)
    {
        return $this->couponRepository->createCoupon($validatedRequest);
    }

    public function showCoupon($id)
    {
        return CouponResource::make($this->couponRepository->getCoupon($id));
    }

    public function updateCoupon($validatedRequest, $id)
    {
        return CouponResource::make($this->couponRepository->updateCoupon($validatedRequest, $id));
    }

    public function deleteCoupon($id)
    {
        return $this->couponRepository->deleteCoupon($id);
    }
}
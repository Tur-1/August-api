<?php

namespace App\Modules\Coupons\Repository;

use App\Modules\Coupons\Models\Coupon;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\PageNotFoundException;
use Illuminate\Database\Eloquent\Collection;

class CouponRepository
{
    private $coupon;

    public function __construct()
    {
        $this->coupon = new Coupon();
    }
    public function getAll($records)
    {
        return $this->coupon->paginate($records);
    }
    public function getValidCoupon($code)
    {
        return Coupon::where('code', $code)
            ->notExpired()
            ->notReachedMaximumUses()
            ->first();
    }
    public function createCoupon($validatedRequest)
    {
        return $this->coupon->create($validatedRequest);
    }
    public function getCoupon($id)
    {

        $this->coupon = $this->coupon->find($id);
        if (is_null($this->coupon)) {
            throw new PageNotFoundException();
        }

        return $this->coupon;
    }
    public function updateCoupon($validatedRequest, $id)
    {
        $coupon = $this->getCoupon($id);
        $coupon->update($validatedRequest);
        return  $coupon;
    }
    public function deleteCoupon($id)
    {
        return $this->coupon->where('id', $id)->delete();
    }
}
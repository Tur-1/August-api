<?php

namespace App\Modules\Coupons\EloquentBuilders;

use Illuminate\Database\Eloquent\Builder;


class CouponBuilder extends Builder
{
    public function notExpired(): self
    {
        return $this->whereDate('expires_at', '>', date('Y-m-d'));
    }
    public function notReachedMaximumUses(): self
    {
        return $this->whereColumn('used_times', '<', 'use_times');
    }
}
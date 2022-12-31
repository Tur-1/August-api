<?php

namespace App\Modules\Reviews\EloquentBuilders;

use Illuminate\Database\Eloquent\Builder;


class ReviewBuilder extends Builder
{
    public function isNotRead(): self
    {
        return $this->where('is_read', false);
    }
    public function withoutReplies(): self
    {
        return $this->whereNull('review_id');
    }
}
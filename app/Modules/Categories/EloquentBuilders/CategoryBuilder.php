<?php

namespace App\Modules\Categories\EloquentBuilders;

use Illuminate\Database\Eloquent\Builder;

class CategoryBuilder extends Builder
{
    public function sections(): self
    {
        return $this->where('is_section', true);
    }

    public function withSection(): self
    {
        return $this->with('section');
    }

    public function orderBySection(): self
    {
        return $this->orderBy('is_section', 'desc');
    }

    public function whereSection($section_id): self
    {
        return $this->where([
            'is_section' => 1,
            'id' => $section_id,
        ]);
    }
}
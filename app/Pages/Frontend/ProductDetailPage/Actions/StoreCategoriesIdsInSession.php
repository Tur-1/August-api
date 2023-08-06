<?php

namespace App\Pages\Frontend\ProductDetailPage\Actions;

use Illuminate\Support\Facades\Session;



class StoreCategoriesIdsInSession
{
    public function handle($categories)
    {
        Session::put('categoriesIds', $categories->pluck('id')->toArray());
    }
}

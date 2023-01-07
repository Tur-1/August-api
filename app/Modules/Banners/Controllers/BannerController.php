<?php

namespace App\Modules\Banners\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Banners\Models\Banner;
use Illuminate\Http\Request;
use App\Modules\Banners\Requests\StoreBannerRequest;
use App\Modules\Banners\Requests\UpdateBannerRequest;
use App\Modules\Banners\Services\BannerService;


class BannerController extends Controller
{


    private $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }


    public function index(Request $request)
    {

        $this->authorize('viewAny', Banner::class);
        return  $this->bannerService->getAll();
    }


    public function storeBanner(StoreBannerRequest $request)
    {

        $this->authorize('create', Banner::class);

        $request->validated();

        $this->bannerService->createBanner($request);

        return response()->success([
            'message' => 'Banner has been created successfully'
        ]);
    }


    public function showBanner($id)
    {
        $this->authorize('view', Banner::class);
        $banner =  $this->bannerService->showBanner($id);

        return response()->success([
            'banner' => $banner
        ]);
    }


    public function updateBanner(UpdateBannerRequest $request, $id)
    {
        $this->authorize('update', Banner::class);
        $request->validated();

        $banner =  $this->bannerService->updateBanner($request, $id);

        return response()->success([
            'message' => 'Banner has been updated successfully',
            'banner' => $banner,
        ]);
    }


    public function destroyBanner($id)
    {
        $this->authorize('delete', Banner::class);

        $this->bannerService->deleteBanner($id);

        return response()->success([
            'message' => 'Banner has been deleted successfully',
        ]);
    }
}
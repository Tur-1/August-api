<?php

namespace App\Pages\Admin\BannersPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Admin\BannersPage\Services\BannerService;
use App\Pages\Admin\BannersPage\Requests\StoreBannerRequest;
use App\Pages\Admin\BannersPage\Requests\UpdateBannerRequest;
use App\Traits\UserCanAccess;

class BannerController extends Controller
{
    use UserCanAccess;
    private $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }


    public function index(Request $request)
    {
        $this->userCan('access-banners');

        return $this->bannerService->getAll();
    }



    public function publishBanner($id)
    {

        $this->userCan('access-banners');


        $this->bannerService->publishBanner($id);

        return response()->success([
            'message' => 'Banner has been updated successfully'
        ]);
    }
    public function storeBanner(StoreBannerRequest $request)
    {

        $this->userCan('create-banners');

        $request->validated();

        $this->bannerService->createBanner($request);

        return response()->success([
            'message' => 'Banner has been created successfully'
        ]);
    }


    public function showBanner($id)
    {
        $this->userCan('view-banners');
        $banner =  $this->bannerService->showBanner($id);

        return response()->success([
            'banner' => $banner
        ]);
    }


    public function updateBanner(UpdateBannerRequest $request, $id)
    {
        $this->userCan('update-banners');
        $request->validated();

        $banner =  $this->bannerService->updateBanner($request, $id);

        return response()->success([
            'message' => 'Banner has been updated successfully',
            'banner' => $banner,
        ]);
    }


    public function destroyBanner($id)
    {
        $this->userCan('delete-banners');

        $this->bannerService->deleteBanner($id);

        return response()->success([
            'message' => 'Banner has been deleted successfully',
        ]);
    }
}

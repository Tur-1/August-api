<?php

namespace App\Pages\Admin\BannersPage\Controllers;

use Illuminate\Http\Request;
use App\Actions\UserCanAccessAction;
use App\Exceptions\UnauthorizedException;
use App\Http\Controllers\Controller;
use App\Pages\Admin\BannersPage\Services\BannerService;
use App\Pages\Admin\BannersPage\Requests\StoreBannerRequest;
use App\Pages\Admin\BannersPage\Requests\UpdateBannerRequest;

class BannerController extends Controller
{


    private $userCanAccess;
    private $bannerService;

    public function __construct(BannerService $bannerService, UserCanAccessAction $userCanAccessAction)
    {
        $this->bannerService = $bannerService;
        $this->userCanAccess = $userCanAccessAction;
    }


    public function index(Request $request)
    {
        try {
            $this->userCanAccess->userCan('access-banners');
        } catch (UnauthorizedException $ex) {
            return response()->error($ex->getMessage(), $ex->getCode());
        }

        return $this->bannerService->getAll();
    }



    public function publishBanner($id)
    {

        $this->userCanAccess->userCan('access-banners');


        $this->bannerService->publishBanner($id);

        return response()->success([
            'message' => 'Banner has been updated successfully'
        ]);
    }
    public function storeBanner(StoreBannerRequest $request)
    {

        $this->userCanAccess->userCan('create-banners');

        $request->validated();

        $this->bannerService->createBanner($request);

        return response()->success([
            'message' => 'Banner has been created successfully'
        ]);
    }


    public function showBanner($id)
    {
        $this->userCanAccess->userCan('view-banners');
        $banner =  $this->bannerService->showBanner($id);

        return response()->success([
            'banner' => $banner
        ]);
    }


    public function updateBanner(UpdateBannerRequest $request, $id)
    {
        $this->userCanAccess->userCan('update-banners');
        $request->validated();

        $banner =  $this->bannerService->updateBanner($request, $id);

        return response()->success([
            'message' => 'Banner has been updated successfully',
            'banner' => $banner,
        ]);
    }


    public function destroyBanner($id)
    {
        $this->userCanAccess->userCan('delete-banners');

        $this->bannerService->deleteBanner($id);

        return response()->success([
            'message' => 'Banner has been deleted successfully',
        ]);
    }
}

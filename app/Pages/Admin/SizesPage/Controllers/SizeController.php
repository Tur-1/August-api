<?php

namespace App\Pages\Admin\SizesPage\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pages\Admin\SizesPage\Requests\StoreSizeRequest;
use App\Pages\Admin\SizesPage\Requests\UpdateSizeRequest;
use App\Pages\Admin\SizesPage\Services\SizeService;

class SizeController extends Controller
{
    private $sizeService;

    public function __construct(SizeService $sizeService)
    {
        $this->sizeService = $sizeService;
    }

    public function index(Request $request)
    {
        return $this->sizeService->getAll();
    }
    public function getAllSizes(Request $request)
    {
        return $this->sizeService->getAllSizes();
    }

    public function storeSize(StoreSizeRequest $request)
    {
        $validatedRequest = $request->validated();

        $this->sizeService->createSize($request);

        return response()->success([
            'message' => 'Size has been created successfully',
        ]);
    }

    public function showSize($id)
    {
        $size = $this->sizeService->showSize($id);

        return response()->success([
            'size' => $size,
        ]);
    }

    public function updateSize(UpdateSizeRequest $request, $id)
    {
        $validatedRequest = $request->validated();

        $size = $this->sizeService->updateSize($request, $id);

        return response()->success([
            'message' => 'Size has been updated successfully',
            'size' => $size,
        ]);
    }

    public function destroySize($id)
    {
        $this->sizeService->deleteSize($id);

        return response()->success([
            'message' => 'Size has been deleted successfully',
        ]);
    }
}
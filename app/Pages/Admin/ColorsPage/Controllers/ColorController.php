<?php

namespace App\Pages\Admin\ColorsPage\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pages\Admin\ColorsPage\Requests\StoreColorRequest;
use App\Pages\Admin\ColorsPage\Requests\UpdateColorRequest;
use App\Pages\Admin\ColorsPage\Services\ColorService;

class ColorController extends Controller
{
    private $colorService;

    public function __construct(ColorService $colorService)
    {
        $this->colorService = $colorService;
    }

    public function index(Request $request)
    {
        $this->userCan('access-colors');

        return $this->colorService->getAll();
    }
    public function getAllColors()
    {
        return $this->colorService->getAllColors();
    }

    public function storeColor(StoreColorRequest $request)
    {

        $this->userCan('create-colors');

        $request->validated();

        $this->colorService->createColor($request);

        return response()->success([
            'message' => 'Color has been created successfully',
        ]);
    }

    public function showColor($id)
    {
        $this->userCan('view-colors');

        $color = $this->colorService->showColor($id);

        return response()->success([
            'color' => $color,
        ]);
    }

    public function updateColor(UpdateColorRequest $request, $id)
    {
        $this->userCan('update-colors');

        $request->validated();


        $color = $this->colorService->updateColor($request, $id);

        return response()->success([
            'message' => 'Color has been updated successfully',
            'color' =>   $color,
        ]);
    }

    public function destroyColor($id)
    {
        $this->userCan('delete-colors');

        $this->colorService->deleteColor($id);

        return response()->success([
            'message' => 'Color has been deleted successfully',
        ]);
    }
}

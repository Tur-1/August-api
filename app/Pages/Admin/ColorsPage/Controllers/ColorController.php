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
        return $this->colorService->getAll();
    }
    public function getAllColors()
    {
        return $this->colorService->getAllColors();
    }

    public function storeColor(StoreColorRequest $request)
    {


        $request->validated();

        $this->colorService->createColor($request);

        return response()->success([
            'message' => 'Color has been created successfully',
        ]);
    }

    public function showColor($id)
    {
        $color = $this->colorService->showColor($id);

        return response()->success([
            'color' => $color,
        ]);
    }

    public function updateColor(UpdateColorRequest $request, $id)
    {
        $request->validated();


        $color = $this->colorService->updateColor($request, $id);

        return response()->success([
            'message' => 'Color has been updated successfully',
            'color' =>   $color,
        ]);
    }

    public function destroyColor($id)
    {
        $this->colorService->deleteColor($id);

        return response()->success([
            'message' => 'Color has been deleted successfully',
        ]);
    }
}

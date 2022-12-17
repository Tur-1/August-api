<?php

namespace App\Modules\Colors\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Colors\Requests\StoreColorRequest;
use App\Modules\Colors\Requests\UpdateColorRequest;
use App\Modules\Colors\Services\ColorService;

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
           'color' => $color,
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
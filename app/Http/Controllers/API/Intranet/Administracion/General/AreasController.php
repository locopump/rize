<?php

namespace App\Http\Controllers\API\Intranet\Administracion\General;

use App\Http\Controllers\Controller;
use App\Models\Services\Publico\AreasService;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    protected $areas;

    public function __construct(AreasService $areas)
    {
        $this->areas = $areas;
    }

    public function getAreas(Request $request)
    {
        $area = (
        $request->route('id') ?
            $this->areas->getRow($request->route('id')) :
            $this->areas->getAll()
        );
        return $area;
    }

    public function deleteArea(Request $request)
    {
        $area = $this->areas->delete($request->route('id'));
        return $area;
    }
}

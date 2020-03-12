<?php

namespace App\Http\Controllers\API\Intranet\Administracion\General;

use App\Http\Controllers\Controller;
use App\Models\Services\Publico\VisitsService;
use Illuminate\Http\Request;

class VisitsController extends Controller
{
    protected $visits;

    public function __construct(VisitsService $visits)
    {
        $this->visits = $visits;
    }

    public function getVisits(Request $request)
    {
        $visit = (
        $request->route('id') ?
            $this->visits->getRow($request->route('id')) :
            $this->visits->getAll()
        );
        return $visit;
    }

    public function deleteVisit(Request $request)
    {
        $visit = $this->visits->delete($request->route('id'));
        return $visit;
    }
}

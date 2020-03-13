<?php

namespace App\Http\Controllers\API\Intranet\Administracion\General;

use App\Http\Controllers\Controller;
use App\Models\Services\Publico\VisitorsService;
use Illuminate\Http\Request;

class VisitorsController extends Controller
{
    protected $visitors;

    public function __construct(VisitorsService $visitors)
    {
        $this->visitors = $visitors;
    }

    public function getVisitors(Request $request)
    {
        $visitor = (
        $request->route('id') ?
            $this->visitors->getRow($request->route('id')) :
            $this->visitors->getAll()
        );
        return $visitor;
    }

    public function deleteVisitor(Request $request)
    {
        $visitor = $this->visitors->delete($request->route('id'));
        return $visitor;
    }

    public function getResumenVisitors(Request $request)
    {
        $visitors = $this->visitors->getVisitors();
        return $visitors;
    }
}

<?php

namespace App\Http\Controllers\API\Intranet\Administracion\General;

use App\Http\Controllers\Controller;
use App\Models\Services\Publico\CountsService;
use Illuminate\Http\Request;

class CountsController extends Controller
{
    protected $counts;

    public function __construct(CountsService $counts)
    {
        $this->counts = $counts;
    }

    public function getCounts(Request $request)
    {
        $count = (
        $request->route('id') ?
            $this->counts->getRow($request->route('id')) :
            $this->counts->getAll()
        );
        return $count;
    }

    public function deleteArea(Request $request)
    {
        $count = $this->counts->delete($request->route('id'));
        return $count;
    }
}

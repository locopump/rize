<?php

namespace App\Http\Controllers\API\Intranet\Administracion\General;

use App\Http\Controllers\Controller;
use App\Models\Services\Publico\SsTenantsService;
use Illuminate\Http\Request;

class SsTenantsController extends Controller
{
    protected $sstenants;

    public function __construct(SsTenantsService $sstenants)
    {
        $this->sstenants = $sstenants;
    }

    public function getSsTenants(Request $request)
    {
        $sstenant = (
        $request->route('id') ?
            $this->sstenants->getRow($request->route('id')) :
            $this->sstenants->getAll()
        );
        return $sstenant;
    }

    public function deleteSsTenant(Request $request)
    {
        $sstenant = $this->sstenants->delete($request->route('id'));
        return $sstenant;
    }
}

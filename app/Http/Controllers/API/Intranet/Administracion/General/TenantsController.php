<?php

namespace App\Http\Controllers\API\Intranet\Administracion\General;

use App\Http\Controllers\Controller;
use App\Models\Services\Publico\TenantsService;
use Illuminate\Http\Request;

class TenantsController extends Controller
{
    protected $tenants;

    public function __construct(TenantsService $tenants)
    {
        $this->tenants = $tenants;
    }

    public function getTenants(Request $request)
    {
        $tenant = (
        $request->route('id') ?
            $this->tenants->getRow($request->route('id')) :
            $this->tenants->getAll()
        );
        return $tenant;
    }

    public function deleteTenant(Request $request)
    {
        $tenant = $this->tenants->delete($request->route('id'));
        return $tenant;
    }

    public function getLocatariosCategoria()
    {
        $tenants = $this->tenants->getLocatariosCategoria();
        return $tenants;
    }
}

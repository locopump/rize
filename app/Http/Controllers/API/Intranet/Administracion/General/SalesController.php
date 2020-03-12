<?php

namespace App\Http\Controllers\API\Intranet\Administracion\General;

use App\Http\Controllers\Controller;
use App\Models\Services\Publico\SalesService;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    protected $sales;

    public function __construct(SalesService $sales)
    {
        $this->sales = $sales;
    }

    public function getSales(Request $request)
    {
        $sale = (
        $request->route('id') ?
            $this->sales->getRow($request->route('id')) :
            $this->sales->getAll()
        );
        return $sale;
    }

    public function deleteSale(Request $request)
    {
        $sale = $this->sales->delete($request->route('id'));
        return $sale;
    }

    public function getVentasModulo(Request $request)
    {
        $ventas = $this->sales->getVentasModulo();
        return $ventas;
    }

    public function getVentasFecha(Request $request)
    {
        $rango = null;
        if ($request->isMethod('post')) {
            if ( $request->get('fecha_ini') && $request->get('fecha_fin') ) {
                $rango = array(
                    'fecha_ini' => $request->get('fecha_ini'),
                    'fecha_fin' => $request->get('fecha_fin')
                );
                $ventas = $this->sales->getVentasFecha($rango);
            }
            $ventas = $this->sales->getVentasFecha();
        }
        return $ventas;
    }
}

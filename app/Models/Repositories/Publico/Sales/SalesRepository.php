<?php


namespace App\Models\Repositories\Publico\Sales;

use App\Models\Entities\Publico\Sales;
use Illuminate\Support\Facades\DB;


class SalesRepository implements SalesInterface
{
    public function register(array $data)
    {
        $sales = Sales::create($data);
        return $sales;
    }

    public function getAll()
    {
        $sales = Sales::get();
        return $sales;
    }

    public function getRow(int $id)
    {
        $sales = Sales::find($id);
        return $sales;
    }

    public function update(array $data,int $id)
    {
        $sales = Sales::where('id', $id)
            ->update($data);
        return $sales;
    }

    public function delete(int $id)
    {
        $sales = Sales::find($id)->delete();
        return $sales;
    }

    /**
     * METODOS MIXTOS
     */

    public function getVentasModulo()
    {
        $ventas = Sales::select(
            'ss_tenant_name',
            DB::raw('sum(num_sales) as monto_total'),
            DB::raw('sum(num_transactions) total_ventas')
        )
            ->groupBy('ss_tenant_name')
            ->orderBy('ss_tenant_name', 'asc')
        ->get();
        return $ventas;
    }

    public function getVentasFecha()
    {
        $ventas = Sales::select(
            DB::raw('date(date) as fecha'),
            DB::raw('sum(num_sales) monto_total'),
            DB::raw('sum(num_transactions) total_ventas')
            )
            ->groupBy(DB::raw('date(date)'))
            ->orderBy(DB::raw('date(date)'), 'asc')
//            ->get()
        ;
        return $ventas;
    }
}

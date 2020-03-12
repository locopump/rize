<?php


namespace App\Models\Repositories\Publico\Areas;

use App\Models\Entities\Publico\Areas;
use Illuminate\Support\Facades\DB;


class AreasRepository implements AreasInterface
{
    public function register(array $data)
    {
        $areas = Areas::create($data);
        return $areas;
    }

    public function getAll()
    {
        $areas = Areas::get();
        return $areas;
    }

    public function getRow(int $id)
    {
        $areas = Areas::find($id);
        return $areas;
    }

    public function update(array $data,int $id)
    {
        $areas = Areas::where('id', $id)
            ->update($data);
        return $areas;
    }

    public function delete(int $id)
    {
        $areas = Areas::find($id)->delete();
        return $areas;
    }

    public function getAllDetails()
    {
        $areas = DB::table('areas as a')
            ->select(
                'a.id',
                't.brand as marca_locatario',
                'v.name as centro_comercial',
                'a.m2',
                'a.floor_num as nro_piso',
                'a.group_id'
        )
            ->leftJoin('venues as v', 'a.venue_id', '=', 'v.id')
            ->leftJoin('tenants as t', 'a.tenant_id', '=', 't.id')
            ->get();
        return $areas;
    }

    public function getRowDetails($id)
    {
        $areas = DB::table('areas as a')
            ->select(
                'a.id',
                't.brand as marca_locatario',
                'v.name as centro_comercial',
                'a.m2',
                'a.floor_num as nro_piso',
                'a.group_id'
        )
            ->leftJoin('venues as v', 'a.venue_id', '=', 'v.id')
            ->leftJoin('tenants as t', 'a.tenant_id', '=', 't.id')
            ->where('a.id', $id)
            ->get();
        return $areas;
    }
}

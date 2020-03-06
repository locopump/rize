<?php


namespace App\Models\Repositories\Publico\Areas;

use App\Models\Entities\Publico\Areas;


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
}

<?php


namespace App\Models\Repositories\Publico\Visits;

use App\Models\Entities\Publico\Visits;


class VisitsRepository implements VisitsInterface
{
    public function register(array $data)
    {
        $visits = Visits::create($data);
        return $visits;
    }

    public function getAll()
    {
        $visits = Visits::get();
        return $visits;
    }

    public function getRow(int $id)
    {
        $visits = Visits::find($id);
        return $visits;
    }

    public function update(array $data,int $id)
    {
        $visits = Visits::where('id', $id)
            ->update($data);
        return $visits;
    }

    public function delete(int $id)
    {
        $visits = Visits::find($id)->delete();
        return $visits;
    }
}

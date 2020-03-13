<?php


namespace App\Models\Repositories\Publico\Visitors;

use App\Models\Entities\Publico\Visitors;
use Illuminate\Support\Facades\DB;


class VisitorsRepository implements VisitorsInterface
{
    public function register(array $data)
    {
        $visitors = Visitors::create($data);
        return $visitors;
    }

    public function getAll()
    {
        $visitors = Visitors::get();
        return $visitors;
    }

    public function getRow(int $id)
    {
        $visitors = Visitors::find($id);
        return $visitors;
    }

    public function update(array $data,int $id)
    {
        $visitors = Visitors::where('id', $id)
            ->update($data);
        return $visitors;
    }

    public function delete(int $id)
    {
        $visitors = Visitors::find($id)->delete();
        return $visitors;
    }

    public function getVisitors()
    {
        $count = Visitors::select(
            'gender as genero',
            DB::raw('count(*) as total_visitantes')
        )
            ->groupBy('gender')
            ->orderBy('gender')
            ->get();
        return $count;
    }
}

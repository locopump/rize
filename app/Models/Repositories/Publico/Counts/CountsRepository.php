<?php


namespace App\Models\Repositories\Publico\Counts;

use App\Models\Entities\Publico\Counts;
use Illuminate\Support\Facades\DB;


class CountsRepository implements CountsInterface
{
    public function register(array $data)
    {
        $counts = Counts::create($data);
        return $counts;
    }

    public function getAll()
    {
        $counts = Counts::get();
        return $counts;
    }

    public function getRow(int $id)
    {
        $counts = Counts::find($id);
        return $counts;
    }

    public function update(array $data,int $id)
    {
        $counts = Counts::where('id', $id)
            ->update($data);
        return $counts;
    }

    public function delete(int $id)
    {
        $counts = Counts::find($id)->delete();
        return $counts;
    }

    public function getResumenCounts()
    {
        $count = Counts::select(
            DB::raw('date(date) as fecha'),
            DB::raw('sum(num_ingress) as total_ingresos'),
            DB::raw('sum(num_transit) as total_transito')
        )
            ->groupBy(DB::raw('date(date)'))
            ->orderBy(DB::raw('date(date)'))
            ->get();
        return $count;
    }
}

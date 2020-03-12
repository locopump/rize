<?php


namespace App\Models\Repositories\Publico\Venues;

use App\Models\Entities\Publico\Venues;


class VenuesRepository implements VenuesInterface
{
    public function register(array $data)
    {
        $venues = Venues::create($data);
        return $venues;
    }

    public function getAll()
    {
        $venues = Venues::get();
        return $venues;
    }

    public function getRow(int $id)
    {
        $venues = Venues::find($id);
        return $venues;
    }

    public function update(array $data,int $id)
    {
        $venues = Venues::where('id', $id)
            ->update($data);
        return $venues;
    }

    public function delete(int $id)
    {
        $venues = Venues::find($id)->delete();
        return $venues;
    }
}

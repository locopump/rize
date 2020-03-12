<?php


namespace App\Models\Repositories\Publico\SsTenants;

use App\Models\Entities\Publico\SsTenants;


class SsTenantsRepository implements SsTenantsInterface
{
    public function register(array $data)
    {
        $sstenants = SsTenants::create($data);
        return $sstenants;
    }

    public function getAll()
    {
        $sstenants = SsTenants::get();
        return $sstenants;
    }

    public function getRow(int $id)
    {
        $sstenants = SsTenants::find($id);
        return $sstenants;
    }

    public function update(array $data,int $id)
    {
        $sstenants = SsTenants::where('id', $id)
            ->update($data);
        return $sstenants;
    }

    public function delete(int $id)
    {
        $sstenants = SsTenants::find($id)->delete();
        return $sstenants;
    }
}

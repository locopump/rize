<?php


namespace App\Models\Repositories\Publico\Tenants;

use App\Models\Entities\Publico\Tenants;
use Illuminate\Support\Facades\DB;


class TenantsRepository implements TenantsInterface
{
    public function register(array $data)
    {
        $tenants = Tenants::create($data);
        return $tenants;
    }

    public function getAll()
    {
        $tenants = Tenants::get();
        return $tenants;
    }

    public function getRow(int $id)
    {
        $tenants = Tenants::find($id);
        return $tenants;
    }

    public function update(array $data,int $id)
    {
        $tenants = Tenants::where('id', $id)
            ->update($data);
        return $tenants;
    }

    public function delete(int $id)
    {
        $tenants = Tenants::find($id)->delete();
        return $tenants;
    }

    /**
     * METODOS MIXTOS
     */

    public function getAllLocatariosCategoria()
    {
        $categories = Tenants::select(
            'category as categoria',
            DB::raw('count(brand) total_marcas')
        )
            ->groupBy('category')
            ->orderBy('category', 'asc')
            ->get();
        return $categories;
    }

    public function getLocatariosCategoria($category)
    {
        $categories = Tenants::select(
            'category as categoria',
            DB::raw('count(brand) total_marcas')
        )
            ->where('category', $category)
            ->groupBy('category')
            ->orderBy('category', 'asc')
            ->get();
        return $categories;
    }
}

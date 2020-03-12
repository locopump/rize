<?php


namespace App\Models\Repositories\Publico\Tenants;


interface TenantsInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function register(array $data);

    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param int $id
     * @return mixed
     */
    public function getRow(int $id);

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data,int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);

    /**
     * @return mixed
     */
    public function getAllLocatariosCategoria();

    /**
     * @return mixed
     */
    public function getLocatariosCategoria($category);
}

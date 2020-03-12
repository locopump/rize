<?php


namespace App\Models\Repositories\Publico\Sales;


interface SalesInterface
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
    public function getAllVentasModulo();

    /**
     * @param $ss_tenant_name
     * @return mixed
     */
    public function getVentasModulo($ss_tenant_name);
}

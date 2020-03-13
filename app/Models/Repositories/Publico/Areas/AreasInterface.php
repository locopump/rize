<?php


namespace App\Models\Repositories\Publico\Areas;


interface AreasInterface
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
    public function getAllDetails();

    /**
     * @return mixed
     */
    public function getRowDetails($id);

    /**
     * @return mixed
     */
    public function getAreasByGroup();

    /**
     * @param string $group_id
     * @return mixed
     */
    public function getAreaByGroup(string $group_id);
}

<?php


namespace App\Models\Repositories\Publico\Likes;


interface LikesInterface
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
    public function getLikes();

    /**
     * @param string $email
     * @return mixed
     */
    public function getLikesByEmail(string $email);

    /**
     * @return mixed
     */
    public function getLikesByGender();

    /**
     * @return mixed
     */
    public function getLikesByTenant();

    /**
     * @return mixed
     */
    public function getLikesByBrand();
}

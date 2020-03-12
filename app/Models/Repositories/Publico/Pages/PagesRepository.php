<?php


namespace App\Models\Repositories\Publico\Pages;

use App\Models\Entities\Publico\Pages;


class PagesRepository implements PagesInterface
{
    public function register(array $data)
    {
        $pages = Pages::create($data);
        return $pages;
    }

    public function getAll()
    {
        $pages = Pages::get();
        return $pages;
    }

    public function getRow(int $id)
    {
        $pages = Pages::find($id);
        return $pages;
    }

    public function update(array $data,int $id)
    {
        $pages = Pages::where('id', $id)
            ->update($data);
        return $pages;
    }

    public function delete(int $id)
    {
        $pages = Pages::find($id)->delete();
        return $pages;
    }
}

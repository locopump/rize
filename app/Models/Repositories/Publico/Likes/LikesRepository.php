<?php


namespace App\Models\Repositories\Publico\Likes;

use App\Models\Entities\Publico\Likes;
use Illuminate\Support\Facades\DB;


class LikesRepository implements LikesInterface
{
    public function register(array $data)
    {
        $likes = Likes::create($data);
        return $likes;
    }

    public function getAll()
    {
        $likes = Likes::get();
        return $likes;
    }

    public function getRow(int $id)
    {
        $likes = Likes::find($id);
        return $likes;
    }

    public function update(array $data,int $id)
    {
        $likes = Likes::where('id', $id)
            ->update($data);
        return $likes;
    }

    public function delete(int $id)
    {
        $likes = Likes::find($id)->delete();
        return $likes;
    }

    public function getLikes()
    {
        $count = Likes::select(
           'email',
            DB::raw('count(*) as marcas_con_like')
        )
            ->groupBy('email')
            ->orderBy('email')
            ->get();
        return $count;
    }

    public function getLikesByEmail(string $email)
    {
        $count = Likes::select(
            'email',
            DB::raw('count(*) as marcas_con_like')
        )
            ->where('email', $email)
            ->groupBy('email')
            ->orderBy('email')
            ->get();
        return $count;
    }
}

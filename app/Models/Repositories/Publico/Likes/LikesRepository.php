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

    public function getLikesByGender()
    {
        $genderLikes = DB::table('likes as l')
            ->select(
            'gender',
            DB::raw('count(l.*) as marcas_con_like')
        )
            ->rightJoin('visitors as v', 'l.email', '=', 'v.email')
            ->groupBy('gender')
            ->orderBy('gender')
            ->get();
        return $genderLikes;
    }

    public function getLikesByTenant()
    {
        $tenantLikes = DB::table('tenants as t')
            ->select(
            't.id as locatario',
            DB::raw('count(l.*) as total_likes')
        )
            ->join('pages as p', 't.brand', '=', 'p.brand')
            ->join('likes as l', 'p.clean_name', '=', 'l.clean_name')
            ->groupBy('t.id')
            ->orderBy('t.id')
            ->get();
        return $tenantLikes;
    }

    public function getLikesByBrand()
    {
        $brandLikes = DB::table('pages as p')
            ->select(
            'p.brand as marca',
            DB::raw('count(l.clean_name) as total_likes')
        )
            ->join('likes as l', 'l.clean_name', '=', 'p.clean_name')
            ->groupBy('p.brand')
            ->orderBy('p.brand')
            ->get();
        return $brandLikes;
    }
}

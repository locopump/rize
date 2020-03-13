<?php

namespace App\Http\Controllers\API\Intranet\Administracion\General;

use App\Http\Controllers\Controller;
use App\Models\Services\Publico\LikesService;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    protected $likes;

    public function __construct(LikesService $likes)
    {
        $this->likes = $likes;
    }

    public function getLikes(Request $request)
    {
        $like = (
        $request->route('id') ?
            $this->likes->getRow($request->route('id')) :
            $this->likes->getAll()
        );
        return $like;
    }

    public function deleteLike(Request $request)
    {
        $like = $this->likes->delete($request->route('id'));
        return $like;
    }

    public function getLikesByEmail(Request $request)
    {
        $likes = (
        $request->route('email') ?
            $this->likes->getLikesByEmail($request->route('email')) :
            $this->likes->getLikes()
        );
        return $likes;
    }
}

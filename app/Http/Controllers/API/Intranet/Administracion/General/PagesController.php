<?php

namespace App\Http\Controllers\API\Intranet\Administracion\General;

use App\Http\Controllers\Controller;
use App\Models\Services\Publico\PagesService;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    protected $pages;

    public function __construct(PagesService $pages)
    {
        $this->pages = $pages;
    }

    public function getPages(Request $request)
    {
        $page = (
        $request->route('id') ?
            $this->pages->getRow($request->route('id')) :
            $this->pages->getAll()
        );
        return $page;
    }

    public function deletePage(Request $request)
    {
        $page = $this->pages->delete($request->route('id'));
        return $page;
    }
}

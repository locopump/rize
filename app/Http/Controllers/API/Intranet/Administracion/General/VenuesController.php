<?php

namespace App\Http\Controllers\API\Intranet\Administracion\General;

use App\Http\Controllers\Controller;
use App\Models\Services\Publico\VenuesService;
use Illuminate\Http\Request;

class VenuesController extends Controller
{
    protected $venues;

    public function __construct(VenuesService $venues)
    {
        $this->venues = $venues;
    }

    public function getVenues(Request $request)
    {
        $venue = (
        $request->route('id') ?
            $this->venues->getRow($request->route('id')) :
            $this->venues->getAll()
        );
        return $venue;
    }

    public function deleteVenue(Request $request)
    {
        $venue = $this->venues->delete($request->route('id'));
        return $venue;
    }
}

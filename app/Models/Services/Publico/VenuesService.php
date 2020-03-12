<?php


namespace App\Models\Services\Publico;

use App\Models\Repositories\Publico\Venues\VenuesInterface;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Exceptions\CustomException;


class VenuesService

{
    protected $client;
    protected $venues;

    public function __construct(VenuesInterface $venues)
    {
        $this->venues = $venues;
    }


    public function run($uri, $type = 'GET')
    {
        $res = $this->client->request($type, $uri);
        return json_decode( $res->getBody() );
    }

    public function getAll()
    {
        $response['status'] = 0;
        $response['message'] = '';
        $response['records'] = [];
        $code = 400;
        $headers = ['Content-Type' => 'application/json; charset=UTF-8'];

        try {
            $venues = $this->venues->getAll();

            if ($venues) {
                $code = 200;
                $response = [
                    'success' => true,
                    'data' => $venues,
                    'message' => 'Success.',
                    'code' => $code
                ];

            } else {
                $code = 202;
                $response = [
                    'success' => false,
                    'error' =>
                        [
                            'type' => 'Query',
                            'description' => null
                        ],
                    'message' => 'Error detected!!',
                    'code' => $code
                ];
            }

        } catch (QueryException $e) {
            $response = [
                'success' => false,
                'error' =>
                    [
                        'type' => 'Query',
                        'description' => null
                    ],
                'message' => '¡ERROR! contact with support.',
                'code' => $code
            ];
            Log::critical('Listado de las Venues',
                ['request' => $response, 'exception' => $e->getMessage()]);
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'error' =>
                    [
                        'type' => 'Code',
                        'description' => null
                    ],
                'message' => '¡ERROR! contact with support.',
                'code' => $code
            ];
            Log::alert('Listado de las Venues',
                ['request' => $response, 'exception' => $e->getMessage()]);
        }

        return response()->json($response, $code, $headers);
    }

    public function getRow(int $id)
    {
        $response['status'] = 0;
        $response['message'] = '';
        $response['records'] = [];
        $code = 400;
        $headers = ['Content-Type' => 'application/json; charset=UTF-8'];

        try {
            $venues = $this->venues->getRow($id);

            if ( !empty($venues) ) {
                $code = 200;
                $response = [
                    'success' => true,
                    'data' => $venues,
                    'message' => 'Success.',
                    'code' => $code
                ];

            } else {
                $code = 202;
                $response = [
                    'success' => false,
                    'error' =>
                        [
                            'type' => 'Query',
                            'description' => null
                        ],
                    'message' => 'Error detected!!.',
                    'code' => $code
                ];
            }

        } catch (QueryException $e) {
            $response = [
                'success' => false,
                'error' =>
                    [
                        'type' => 'Query',
                        'description' => null
                    ],
                'message' => '¡ERROR! contact with support.',
                'code' => $code
            ];
            Log::critical('Listado de las Venues',
                ['request' => $response, 'exception' => $e->getMessage()]);
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'error' =>
                    [
                        'type' => 'Code',
                        'description' => null
                    ],
                'message' => '¡ERROR! contact with support.',
                'code' => $code
            ];
            Log::alert('Listado de las Venues',
                ['request' => $response, 'exception' => $e->getMessage()]);
        }

        return response()->json($response, $code, $headers);
    }

    public function delete(int $id)
    {
        $response['status'] = 0;
        $response['message'] = '';
        $code = 400;
        $headers = ['Content-Type' => 'application/json; charset=UTF-8'];

        try {
            $affected_rows = $this->venues->delete($id);

            if ($affected_rows > 0) {
                $code = 200;
                $response = [
                    'success' => true,
                    'data' => $affected_rows . ' fila borrada satisfactoriamente.',
                    'message' => 'Success.',
                    'code' => $code
                ];

            } else {
                $code = 202;
                $response = [
                    'success' => false,
                    'error' =>
                        [
                            'type' => 'Query',
                            'description' => null
                        ],
                    'message' => 'Error detected!!',
                    'code' => $code
                ];
            }
        } catch (QueryException $e) {
            $response = [
                'success' => false,
                'error' =>
                    [
                        'type' => 'Query',
                        'description' => null
                    ],
                'message' => '¡ERROR! contact with support.',
                'code' => $code
            ];
            Log::critical('Delete Row - Venues',
                ['request' => $response, 'exception' => $e->getMessage()]);
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'error' =>
                    [
                        'type' => 'Code',
                        'description' => null
                    ],
                'message' => '¡ERROR! contact with support.',
                'code' => $code
            ];
            Log::alert('Delete Row - Venues',
                ['request' => $response, 'exception' => $e->getMessage()]);
        }

        return response()->json($response, $code, $headers);
    }

}

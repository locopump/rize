<?php


namespace App\Models\Services\Publico;

use App\Models\Repositories\Publico\Visits\VisitsInterface;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Exceptions\CustomException;


class VisitsService

{
    protected $client;
    protected $visits;

    public function __construct(VisitsInterface $visits)
    {
        $this->visits = $visits;
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
            $visits = $this->visits->getAll();

            if ($visits) {
                $code = 200;
                $response = [
                    'success' => true,
                    'data' => $visits,
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
            Log::critical('Listado de las Visits',
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
            Log::alert('Listado de las Visits',
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
            $visits = $this->visits->getRow($id);

            if ( !empty($visits) ) {
                $code = 200;
                $response = [
                    'success' => true,
                    'data' => $visits,
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
            Log::critical('Listado de las Visits',
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
            Log::alert('Listado de las Visits',
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
            $affected_rows = $this->visits->delete($id);

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
            Log::critical('Delete Row - Visits',
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
            Log::alert('Delete Row - Visits',
                ['request' => $response, 'exception' => $e->getMessage()]);
        }

        return response()->json($response, $code, $headers);
    }

}

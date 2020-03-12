<?php


namespace App\Models\Services\Publico;

use App\Models\Repositories\Publico\Sales\SalesInterface;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Exceptions\CustomException;


class SalesService

{
    protected $client;
    protected $sales;

    public function __construct(SalesInterface $sales)
    {
        $this->sales = $sales;
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
            $sales = $this->sales->getAll();

            if ($sales) {
                $code = 200;
                $response = [
                    'success' => true,
                    'data' => $sales,
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
            Log::critical('Listado de las Sales',
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
            Log::alert('Listado de las Sales',
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
            $sales = $this->sales->getRow($id);

            if ( !empty($sales) ) {
                $code = 200;
                $response = [
                    'success' => true,
                    'data' => $sales,
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
            Log::critical('Listado de las Sales',
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
            Log::alert('Listado de las Sales',
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
            $affected_rows = $this->sales->delete($id);

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
            Log::critical('Delete Row - Sales',
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
            Log::alert('Delete Row - Sales',
                ['request' => $response, 'exception' => $e->getMessage()]);
        }

        return response()->json($response, $code, $headers);
    }

    public function getVentasModulo()
    {
        $response['status'] = 0;
        $response['message'] = '';
        $response['records'] = [];
        $code = 400;
        $headers = ['Content-Type' => 'application/json; charset=UTF-8'];

        try {
            $ventas = $this->sales->getVentasModulo();

            if ($ventas) {
                $code = 200;
                $response = [
                    'success' => true,
                    'data' => $ventas,
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
            Log::critical('Listado de las Ventas por Módulo',
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
            Log::alert('Listado de las Ventas por Módulo',
                ['request' => $response, 'exception' => $e->getMessage()]);
        }

        return response()->json($response, $code, $headers);
    }

    public function getVentasFecha(array $rango = null)
    {
        $response['status'] = 0;
        $response['message'] = '';
        $response['records'] = [];
        $code = 400;
        $headers = ['Content-Type' => 'application/json; charset=UTF-8'];

        try {
            $sales = $this->sales->getVentasFecha();
            if ( isset($rango) && $rango != null ) {
                $ventasFecha = ($rango['fecha_ini'] == $rango['fecha_fin']) ?
                    $sales->where(DB::raw('date(date)'), $rango['fecha_ini']) :
                    $sales->whereBetween(DB::raw('date(date)'), [$rango['fecha_ini'], $rango['fecha_fin']])

                ;
            } else {
                $ventasFecha = $this->sales->getVentasFecha();
            }
            $ventasFecha = $ventasFecha->get();

            if ($ventasFecha) {
                $code = 200;
                $response = [
                    'success' => true,
                    'data' => $ventasFecha,
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
            Log::critical('Listado de las Ventas por Módulo',
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
            Log::alert('Listado de las Ventas por Módulo',
                ['request' => $response, 'exception' => $e->getMessage()]);
        }

        return response()->json($response, $code, $headers);
    }

}

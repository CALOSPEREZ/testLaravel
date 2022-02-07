<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *          title="API Centre",
 *          version="3.0",
 *          description="API documentation to CENTRE",
 *          @OA\Contact(
 *               email="cristiannino@lavenir.com.co"
 *          ),
 *          @OA\License(
 *               name="Apache 2.0",
 *               url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *          )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Local API Server"
 * )
*/
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

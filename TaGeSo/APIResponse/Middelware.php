<?php

namespace TaGeSo\APIResponse;

use Closure;

class Middelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $res = $next($request);

        if(is_a($res, \TaGeSo\APIResponse\Response::class)) {
            $returnData = [
                "data" => $res->getData(),
                "success" => $res->getStatus(),
                "msg" => $res->getMessage()
            ];

            if($res->getPagination() !== null) {
                $returnData["pagination"] = $res->getPagination();
            }

            $res = $res->setContent(json_encode($returnData));
            $res = $res->header("content-type", "application/json");
        }

        return $res;
    }
}

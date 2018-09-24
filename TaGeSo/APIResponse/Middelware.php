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
            $res = $res->setContent(json_encode([
                "data" => $res->getData()
            ]));
        }
    }
}

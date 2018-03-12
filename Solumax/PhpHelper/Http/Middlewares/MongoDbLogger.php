<?php

namespace Solumax\PhpHelper\Http\Middlewares;

use Closure;

class MongoDbLogger {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        \DB::connection('mongodb')->enableQueryLog();

        $res = $next($request);

        if (get_class($res) == 'Illuminate\Http\JsonResponse') {

            $data = $res->getData();

            if (gettype($data) == 'object') {

                if (!isset($data->meta)) {
                    $data->meta = new \stdClass();
                }

                if (is_array($data->meta)) {

                    $data->meta['mongodb_queries'] = \DB::connection('mongodb')->getQueryLog();
                } else if (is_object($data->meta)) {

                    $data->meta->mongodb_queries = \DB::connection('mongodb')->getQueryLog();
                }
                $res->setData($data);
            }
        } else {

            $res->headers->set('mongodb_queries', json_encode(\DB::connection('mongodb')->getQueryLog()));
        }

        return $res;
    }

}

<?php

namespace Solumax\PhpHelper\Http\Controllers;

use Illuminate\Routing\Controller;
use League\Fractal;

class ApiBaseV2Controller extends Controller {

    protected $manager;
    protected $transformer;
    protected $dataName;

    public function __construct() {

        $this->manager = new Fractal\Manager();
        $this->manager->setSerializer(new \Solumax\PhpHelper\Fractal\Serializers\ApiBaseV2Serializer);
    }

    public function formatCollection($data, $meta = [], $paginator = null) {

        $this->parseInclude();
        $this->parseExclude();

        $resource = new \League\Fractal\Resource\Collection($data, $this->transformer, $this->dataName);
        $formattedData = $this->manager->createData($resource)->toArray();

        if (!is_null($paginator)) {
            $paginatorAdapter = new Fractal\Pagination\IlluminatePaginatorAdapter($paginator);
            $meta['pagination'] = [
                'count' => $paginatorAdapter->getCount(),
                'current_page' => $paginatorAdapter->getCurrentPage(),
                'per_page' => $paginatorAdapter->getPerPage(),
                'total' => $paginatorAdapter->getTotal(),
                'total_pages' => $paginatorAdapter->getLastPage(),
            ];
        }

        return $this->formatData($formattedData, $meta);
    }

    public function formatItem($data, $meta = []) {

        $this->parseInclude();
        $this->parseExclude();

        if (is_null($data)) {
            return response('Not Found', 404);
        }

        $resource = new \League\Fractal\Resource\Item($data, $this->transformer, $this->dataName);
        $formattedData = $this->manager->createData($resource)->toArray();

        return $this->formatData($formattedData, $meta);
    }

    public function formatErrors($errors) {

        return response()->json(['errors' => $errors], 400);
    }

    public function formatData($data, $meta = []) {

        return response()->json(['data' => $data, 'meta' => $meta]);
    }

    protected function parseInclude() {

        if (request()->has('with')) {
            $this->manager->parseIncludes(explode(',', request()->get('with')));
        }

        if (request()->has('include')) {
            $this->manager->parseIncludes(explode(',', request()->get('include')));
        }
    }

    protected function parseExclude() {

        if (request()->has('without')) {
            $this->manager->parseExcludes(explode(',', request()->get('without')));
        }

        if (request()->has('exclude')) {
            $this->manager->parseExcludes(explode(',', request()->get('exclude')));
        }
    }

}

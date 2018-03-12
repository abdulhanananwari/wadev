<?php

namespace Solumax\PhpHelper\Http\Controllers;

use Illuminate\Routing\Controller;
use League\Fractal;

class ApiBaseV1Controller extends Controller {
    
    protected $manager;
    
    protected $transformer;
    protected $dataName;
    
    public function __construct() {
        
        $this->manager = new Fractal\Manager();
        $this->manager->setSerializer(new Fractal\Serializer\DataArraySerializer());
    }
    
    public function formatCollection($data, $meta = [], $paginator = null) {
        
        $this->parseInclude();
        $this->parseExclude();
        
        $resource = new \League\Fractal\Resource\Collection($data, $this->transformer,
                $this->dataName);
        
        if (!empty($meta)) {
            $resource->setMeta($meta);
        }
        
        if (!is_null($paginator)) {
            $paginator->appends(request()->except('page'));
            $paginatorAdapter = new Fractal\Pagination\IlluminatePaginatorAdapter($paginator);
            $resource->setPaginator($paginatorAdapter);
        }
        
        $formattedData = $this->manager->createData($resource)->toArray();
        
        return response()->json($formattedData);
    }
    
    public function formatItem($data, $meta = []) {
        
        $this->parseInclude();
        $this->parseExclude();
        
        if (is_null($data)) {
            return response('Not Found', 404);
        }
        
        $resource = new \League\Fractal\Resource\Item($data, $this->transformer,
                $this->dataName);
        
        if (!empty($meta)) {
            $resource->setMeta($meta);
        }
        
        $formattedData = $this->manager->createData($resource)->toArray();
        
        return response()->json($formattedData);
    }
    
    public function formatErrors($errors) {
        
        return response()->json(['errors' => $errors], 400);
    }
    
    public function formatData($data) {
        
        return response()->json(['data' => $data]);
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

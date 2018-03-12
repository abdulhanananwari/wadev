<?php

namespace Solumax\PhpHelper\App\Transformers;

abstract class ReportTransformer {

    protected $includedFields;
    protected $excludedFields;

    public function __construct() {
        if (request('included_fields')) {
            $this->includedFields = explode(',', request('included_fields'));
        }
        if (request('excluded_fields')) {
            $this->excludedFields = explode(',', request('excluded_fields'));
        }
    }

    public function transformCollection($collection) {

        $transformeds = [];
        foreach ($collection as $data) {
            $transformed = $this->transform($data);
            $transformed = $this->transformedFilter($transformed);
            $transformeds[] = $transformed;
        }

        return $transformeds;
    }

    protected function transformedFilter($transformed) {

        if (is_array($this->includedFields) && !empty($this->includedFields)) {
            $transformed = array_filter($transformed, function($key) {
                return in_array($key, $this->includedFields);
            }, ARRAY_FILTER_USE_KEY);
        }
        
        if (is_array($this->excludedFields) && !empty($this->excludedFields)) {
            $transformed = array_filter($transformed, function($key) {
                return !in_array($key, $this->excludedFields);
            }, ARRAY_FILTER_USE_KEY);
        }
        
        return $transformed;
    }

}

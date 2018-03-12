<?php

namespace Solumax\PhpHelper\LinkBuilders;

class AwsS3LinkBuilder {
    
    public static function build($file, $folder = '') {
        
        $region = env('AWS_S3_REGION');
        if (is_null($region)) throwException(new \Exception('Region not found in .env', 500));
        
        $bucket = env('AWS_S3_BUCKET');
        if (is_null($region)) throwException(new \Exception('Bucket not found in .env', 500));
        
        $folder = substr($folder, 0, 1) == '/' ? $folder : '/' . $folder;
        $folder = substr($folder, -1) == '/' ? $folder : $folder . '/';
        
        return 'https://s3-' . $region . '.amazonaws.com/' . $bucket . $folder . $file; 
    }
}

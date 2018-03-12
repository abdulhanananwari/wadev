<?php

namespace Solumax\PhpHelper\Helpers;

class Wrapper implements SlackWrapperTraits {
    
    // Wrapper for Maknz Slack. In case the package become obselete

    protected $client;

    public function __construct($endpoint) {
        $this->client = new \Maknz\Slack\Client($endpoint, [
            'username' => 'Dealer App Bot',
        ]);
    }
    
    protected static function sent() {}

}

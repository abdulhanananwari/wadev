<?php

namespace Solumax\PhpHelper\Slack;

interface SlackWrapperInterface {

    public function send($text, $fields = []);
}

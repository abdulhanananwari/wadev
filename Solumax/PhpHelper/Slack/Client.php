<?php

namespace Solumax\PhpHelper\Slack;

use Solumax\PhpHelper\Slack\SlackWrapperInterface;

class Client implements SlackWrapperInterface {

    // Wrapper for Maknz Slack. In case the package become undeveloped

    protected $client;

    public function __construct($webhook, $config) {
        $this->client = new \Maknz\Slack\Client($webhook, $config);
    }
    
    public function send($text, $fields = array()) {

        if (!empty($fields)) {

            $manknzFields = [];

            foreach ($fields as $field) {
                $manknzFields[] = new \Maknz\Slack\AttachmentField([
                    'title' => $field['title'],
                    'value' => $field['value'],
                    'short' => isset($field['short']) ? true : false,
                ]);
            }

            $attachment = new \Maknz\Slack\Attachment([
                'fallback' => $text,
                'text' => $text,
                'fields' => $manknzFields
            ]);
        }

        if (isset($attachment)) {
            $message = $this->client->createMessage();
            $message->attach($attachment)->send();
        } else {
            $this->client->send($text);
        }
    }

}

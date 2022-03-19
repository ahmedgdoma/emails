<?php

use components\rabbitmq\Consumers\SendEmailConsumer;
use components\rabbitmq\Consumers\SheetProcessConsumer;
use mikemadisonweb\rabbitmq\Configuration;

return [
    'class' => Configuration::class,
    'connections' => [
        [
            // You can pass these parameters as a single `url` option: https://www.rabbitmq.com/uri-spec.html
            'host' => 'emails_rabbitmq',
            'port' => '5672',
            'user' => 'rabbitmq',
            'password' => 'rabbitmq',
            'vhost' => '/',
        ]
        // When multiple connections is used you need to specify a `name` option for each one and define them in producer and consumer configuration blocks
    ],
    'exchanges' => [
        [
            'name' => 'exchange',
            'type' => 'direct'
            // Refer to Defaults section for all possible options
        ],
        [
            'name' => 'exchange2',
            'type' => 'direct'
            // Refer to Defaults section for all possible options
        ],
    ],
    'bindings' => [
        [
            'queue' => 'sheet_process',
            'exchange' => 'exchange',
            'routing_keys' => ['sheet_process'],
        ],
        [
            'queue' => 'send_email',
            'exchange' => 'exchange2',
            'routing_keys' => ['send_email'],
        ],
    ],
    'queues' => [
        [
            'name' => 'sheet_process',
        ],
        [
            'name' => 'send_email',
        ],
    ],
    'producers' => [
        [
            'name' => 'sheet_process',
        ],
        [
            'name' => 'send_email',
        ],
    ],
    'consumers' => [
        [
            'name' => 'sheet_process',
            // Every consumer should define one or more callbacks for corresponding queues
            'callbacks' => [
                // queue name => callback class name
                'sheet_process' => SheetProcessConsumer::class,
            ],
        ],
        [
            'name' => 'send_email',
            // Every consumer should define one or more callbacks for corresponding queues
            'callbacks' => [
                // queue name => callback class name
                'sheet_process' => SendEmailConsumer::class,
            ],
        ],
    ],
];
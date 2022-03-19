<?php

namespace components\rabbitmq\Consumers;

use mikemadisonweb\rabbitmq\components\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class SendEmailConsumer implements ConsumerInterface
{
    /**
     * @param AMQPMessage $msg
     * @return bool
     */
    public function execute(AMQPMessage $msg): bool
    {
        $msg = json_decode($msg->body);

        //send email here one
        //same hint: issue in rabbitmq package That MSG_REJECT should be 0 and MSG_ACK should be 1

        return ConsumerInterface::MSG_REJECT;
    }
}
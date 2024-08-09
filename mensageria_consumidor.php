<?php

declare(strict_types=1);

use PhpAmqpLib\Connection\AMQPSocketConnection;
use PhpAmqpLib\Message\AMQPMessage;

require_once 'vendor/autoload.php';

$connection = new AMQPSocketConnection(
    host: 'mensageria',
    port: 5672,
    user: 'guest',
    password: 'guest'
);
$channel = $connection->channel();
$channel->queue_declare(
    'product_bought',
    auto_delete: false
);

$channel->basic_consume(
    queue: 'product_bought',
    no_ack: true,
    callback: function(AMQPMessage $message) {
        echo '[X] Mensagem recebida ' . $message->getBody() . PHP_EOL;
        $message->ack();
    }
);

try {
    $channel->consume();
} catch (\Throwable $th) {
    var_dump($th->getMessage());
}

$channel->close();
$connection->close();

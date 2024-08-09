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

$msg = new AMQPMessage(body: '1234');
$channel->basic_publish(
    msg: $msg,
    exchange: '',
    routing_key: 'product_bought'
);

echo 'Mensagem enviada';

$channel->close();
$connection->close();

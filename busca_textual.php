<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

$client = \Elastic\Elasticsearch\ClientBuilder::create()
    ->setHosts(['busca_textual:9200'])
    ->build();

$response = $client->indices()->create([
    'index' => 'meu_indice'
]);

// $documento = [
//     'nome' => 'Mika',
//     'usuario' => 'mcm'
// ];
// $response = $client->index([
//     'index' => 'meu_indice',
//     'type' => 'usuarios',
//     'body' => $documento
// ]);

// $response = $client->search([
//     'index' => 'meu_indice',
//     'type' => 'usuarios',
//     'body' => [
//         'query' => [
//             'match' => [
//                 'nome' => 'Mika'
//             ]
//         ]
//     ]
// ]);

var_dump($response);
echo $response;

<?php

use DigitalCep\Cep\Search;

require_once __DIR__ . '/Search.php';

$search = new Search();

try {
    $zipcode = '35190-000';

    $address = $search->getAdrresFromZipcode($zipcode);

    print_r($address);

} catch (\Exception $e) {

    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

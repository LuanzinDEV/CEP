<?php

namespace DigitalCep\Cep;

use RuntimeException;

class Search{
    private $url = "https://viacep.com.br/ws/";

    public function getAdrresFromZipcode(String $zipcode): array{
        $zipcode = preg_replace('/[^0-9]/im', '', $zipcode);

        $get = file_get_contents($this->url . $zipcode . "/json");

        if($get===false){
            throw new RuntimeException("Erro na requisição via CEP");
        }

        $endereco = json_decode($get, true);

        if(json_last_error() !== JSON_ERROR_NONE){
            throw new RuntimeException("Erro no json decode");
        }

        return $endereco;
    }
}
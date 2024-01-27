<?php

namespace DigitalCep\Cep;

use RuntimeException;

class Search{
    private $url = "https://viacep.com.br/ws/";
    private $zipcode = '';

    public function getAdrresFromZipcode(String $zipcode): array{
        $this->zipcode = preg_replace('/[^0-9]/im', '',$zipcode);

        $get = file_get_contents($this->url . $this->zipcode . "/asjson");

        if($get===false){
            echo ("Erro na requisição via CEP, alterando api") . PHP_EOL;

            $this->url = "https://cdn.apicep.com/file/apicep/";

            $zipcodeFormated = substr($this->zipcode,0, 5) . '-' . substr($this->zipcode, 5);

            $get = file_get_contents($this->url . $zipcodeFormated . '.json');

            $endereco = json_decode($get, true);

        }else{
            $endereco = json_decode($get, true);
        }  

        if(json_last_error() !== JSON_ERROR_NONE){
            throw new RuntimeException("Erro no json decode");
        }

        return $endereco;
    }
}
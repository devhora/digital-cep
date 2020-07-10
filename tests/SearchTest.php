<?php

use PHPUnit\Framework\TestCase;
use Devhora\DigitalCep\Search;

class SearchTest extends TestCase{

    /**
     * @dataProvider dadosTeste()
     */

    public function testGetAddressFromZipcodeDefaultUsage(string $input, array $espected){

        $result = new Search;

        $result = $result->getAddressFromZipcode($input);

        $this->assertEquals($espected, $result);
    }

    public function dadosTeste(){
        return [
            "Endereço Praça da Sé"=> [
                "01001000",
                [
                    "cep" => "01001-000",
                    "logradouro" => "Praça da Sé",
                    "complemento" => "lado ímpar",
                    "bairro" => "Sé",
                    "localidade" => "São Paulo",
                    "uf" => "SP",
                    "unidade" => "",
                    "ibge" => "3550308",
                    "gia" => "1004"
                ]
            ],
            "Endereço Qualquer"=> [
                "03624010",
                [
                    "logradouro" => "Rua Luís Asson",
                    "cep" => "03624-010",
                    "complemento" => "",
                    "bairro" => "Vila Buenos Aires",
                    "localidade" => "São Paulo",
                    "uf" => "SP",
                    "unidade" => "",
                    "ibge" => "3550308",
                    "gia" => "1004"
                ]
            ],
        ];
    }

}
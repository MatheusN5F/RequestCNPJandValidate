<?php

namespace Src\Api;

class Speedio{
    /**
     * URL Base API Speedio
     * @var string
     */
    const URL_BASE = 'https://api-publica.speedio.com.br';

    /**
     * Método CPNJ
     * @param string $cnpj
     * @return array
     */
    public function consulterCNPJ($cnpj)
    {
        return $this->get('/buscarcnpj?cnpj=' . $cnpj);
    }
    /**
     * Método Execultavel
     * @param string $resource
     * @return array
     */
    public function get($resource)
    {
        $endpoint = self::URL_BASE . $resource;
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL            => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => 'GET',
            CURLOPT_SSL_VERIFYPEER => false
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        $responseArray = json_decode($response, true);
        return is_array($responseArray) ? $responseArray : [];
    }
}

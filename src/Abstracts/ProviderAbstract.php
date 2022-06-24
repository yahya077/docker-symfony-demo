<?php

namespace App\Abstracts;

abstract class ProviderAbstract {
    public string $root = 'http://www.mocky.io/';
    public string $version = 'v2';
    public string $endPoint = ''; //set your api provider endPoint
    public array $response = [];

    //your provider keys
    public array $resourceKeys = [
        'name' => 'id', // if $useKeyAsName is true, you can leave empty
        'hours' => 'sure',
        'difficulty' => 'zorluk'
    ];

    //if your provider task response use key as name
    public bool $useKeyAsName = false;

    //base keys of response
    public $keys = [
        "name",
        "hours",
        "difficulty",
    ];

    //prepares your resource by providers response
    public function prepareResource() : array
    {
        $response = [];
        foreach ($this->response as $key => $item) {
            $key = array_keys($item)[0];
            $response[] = array_combine(
                $this->keys,
                array(
                    $this->useKeyAsName ? $key : $item[$this->resourceKeys['name']],
                    $this->useKeyAsName ? $item[$key][$this->resourceKeys['hours']] : $item[$this->resourceKeys['hours']],
                    $this->useKeyAsName ? $item[$key][$this->resourceKeys['difficulty']] : $item[$this->resourceKeys['difficulty']],
                )
            );
        }
        return $response;
    }

    //brings full url
    public function prepareUrl() : string
    {
        return $this->root.$this->version.'/'.$this->endPoint;
    }

    public function setEndpoint($endpoint): self {
        $this->endPoint = $endpoint;
        return $this;
    }

    public function usesKeyAsName(): self
    {
        $this->useKeyAsName = true;
        return $this;
    }

    public function prepareResourceKeys($hours,$difficulty,$name = 'id'): self{
        $this->resourceKeys['name'] = $name;
        $this->resourceKeys['hours'] = $hours;
        $this->resourceKeys['difficulty'] = $difficulty;
        return $this;
    }

    public function send() : array
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->prepareUrl());
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); // Assuming you're requesting JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        $this->response = json_decode($response,true);
        return $this->prepareResource();
    }
}

<?php
/**
 * Zippopotam.us PHP Library
 *
 * @version 1.0.1
 */

namespace Zippopotamus\Service;

use Zend\Http\Client;
use Zend\Http\Headers;
use Zend\Json\Json;
use Zippopotamus\Entities\Response;

final class Zippopotamus
{
    public static $apiUrl = 'http://api.zippopotam.us/';

    static public function code($countryCode, $postalCode)
    {
        $http = new Client();

        $http->setOptions(array('sslverifypeer' => false));
        $headers = new Headers();
        $headers->addHeaderLine('Content-Type', 'application/json');
        $http->setHeaders($headers);

        $http->setUri(self::$apiUrl . urlencode($countryCode) . '/' . urlencode($postalCode));
        $http->setMethod('GET');

        $response = $http->send();
        $json     = Json::decode($response->getBody(),true);

		$response = new Response($json);

        return $response;
    }

    static public function place($countryCode, $stateCode, $city)
    {
        $http = new Client();

        $http->setOptions(array('sslverifypeer' => false));
        $headers = new Headers();
        $headers->addHeaderLine('Content-Type', 'application/json');
        $http->setHeaders($headers);

        $http->setUri(self::$apiUrl
            . urlencode($countryCode) . '/'
            . urlencode($stateCode) . '/'
            . urlencode($city)
        );
        $http->setMethod('GET');

        $response = $http->send();
        $json     = Json::decode($response->getBody(),true);

		$response = new Response($json);
        return $response;
    }

    static public function nearby($countryCode, $postalCode)
    {
        $http = new Client();

        $http->setOptions(array('sslverifypeer' => false));
        $headers = new Headers();
        $headers->addHeaderLine('Content-Type', 'application/json');
        $http->setHeaders($headers);

        $http->setUri(self::$apiUrl . 'nearby/' . urlencode($countryCode) . '/' . urlencode($postalCode));
        $http->setMethod('GET');

        $response = $http->send();
        $json     = Json::decode($response->getBody());

        return $json;
    }
}

<?php

namespace Jenel\Curl;

/**
 * A class to place service in $di.
 * Curl
 * Return array
 */
class Curl
{
    /**
     * Curl one.
     * @param url
     *
     * @return array
     */
    public function curlOne($url) : array
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);


        return json_decode($response, true);
    }

    /**
     * Curl multi.
     * @param urls
     *
     * @return array
     */
    public function curlMulti($urls) : array
    {
        $options = [
            CURLOPT_RETURNTRANSFER => true,
        ];

        //set the multi handler
        $mh = curl_multi_init();

        //set variable to catch all
        $chAll = [];

        foreach ($urls as $url) {
            $ch = curl_init($url);
            curl_setopt_array($ch, $options);
            curl_multi_add_handle($mh, $ch);
            $chAll[] = $ch;
        };

        // execute all queries simultaneously, and continue when all are complete
        $running = null;
        do {
            curl_multi_exec($mh, $running);
        } while ($running);

        //fix to return as array json
        foreach ($chAll as $ch) {
            $data = curl_multi_getcontent($ch);
            $response[] = json_decode($data, true);
        };

        //close the handles
        curl_multi_remove_handle($mh, $ch);
        curl_multi_close($mh);

        return $response;
    }
}

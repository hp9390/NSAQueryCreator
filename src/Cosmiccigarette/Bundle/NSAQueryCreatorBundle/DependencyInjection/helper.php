<?php
/**
 * Created by PhpStorm.
 * User: Holger
 * Date: 15.03.14
 * Time: 00:03
 */

namespace Cosmiccigarette\Bundle\NSAQueryCreatorBundle\DependencyInjection;

use Cosmiccigarette\Bundle\NSAQueryCreatorBundle\Controller;

class helper {

    static public function returnSearchQueries($amount, $url) {
        $ch = curl_init();
        curl_setopt($ch,
                    CURLOPT_URL,
                    $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if(strpos($url, 'random')) {
            $searchQueryOne = json_decode(curl_exec($ch))->queries->query;
            $searchQueryTwo = json_decode(curl_exec($ch))->queries->query;

            if ($amount > 0) {
                for ($n = 0; $n <= $amount; $n++) {
                    $searchQueryOne .= '+';
                    $searchQueryTwo .= '+';
                    $searchQueryOne .= json_decode(curl_exec($ch))->queries->query;
                    $searchQueryTwo .= json_decode(curl_exec($ch))->queries->query;
                }
            }

            return array('first' => $searchQueryOne, 'second' => $searchQueryTwo);
        } elseif(strpos($url, 'allQueries')) {

            $queries = json_decode(curl_exec($ch))->queries;

            return $queries;
        }




    }

} 

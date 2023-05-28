<?php

namespace app\models;

use Yii;

class API {
    private static $links = [
        'getItems' => 'https://api.mizagene.com/items',
        'getSectors' => 'https://api.mizagene.com/Sectors',
        'setItem' => 'https://api.mizagene.com/End2End_Items',
        'addSubject' => 'https://api.mizagene.com/Subject',
        'getResult' => 'https://api.mizagene.com/ReportShow',
        'getNumbers' => 'https://api.mizagene.com/Subject/'
    ];

    public static function getToken() {
//        $token = file_get_contents(\Yii::getAlias('@rootdir') . DS . 'api_token.txt');
//        if (!$token) {
        $ch = CURL::init("https://api.mizagene.com/Authentication");

        $configs = require \Yii::getAlias('@root_dir') . '/config/cron.php';

        $postData = [
            'email' => $configs['email'],
            'password' => $configs['password']
        ];
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        $token = json_decode(curl_exec($ch))->value;
        file_put_contents('api_token.txt', $token);
        CURL::close($ch);
//        }
        return $token;
    }

    public static function getLink() {
        $link = self::$links[debug_backtrace()[1]['function']];
        return $link ?: new \Exception('missing table');
    }

    public static function returnError($code, $message) {
        http_response_code($code);
        echo json_encode(array(
            "error" => $message
        ));
        die();
    }
}
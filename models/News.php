<?php

namespace app\models;

use Yii;

class News
{
    private static $_instance = null;

    private static $data;

    public static function find()
    {
        $newsJson = file_get_contents(__DIR__."/../models/news.json");
        //$newsJson = file_get_contents("https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fmedium.com%2Ffeed%2Fwwwid");
        $data = json_decode($newsJson, true);
        self::$data = $data['items'];

        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    public static function where($params)
    {
        $data = self::$data;
        $new_data = [];
        foreach($params as $num=>$val){
            $key = array_search($val, array_column($data, $num));
            if ($key!==false) {
                $new_data[] = $data[$key];
            }
        }
        self::$data = $new_data;
        return self::$_instance;
    }

    public static function search($params)
    {
        $data = self::$data;
        $new_data = [];
        foreach($params as $num=>$val){
            $results = preg_grep($val, array_column($data, $num));
            foreach($results as $result){
                $key = array_search($result, array_column($data, $num));
                if ($key!==false) {
                    $new_data[] = $data[$key];
                }
            }
        }
        self::$data = $new_data;
        return self::$_instance;
    }

    public static function one()
    {
        return (self::$data)?self::$data[0]:[];
    }

    public static function all()
    {
        return (self::$data)?self::$data:[];
    }
}

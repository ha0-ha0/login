<?php

    // エラーの表示 1 ・非表示 0
    ini_set('display_errors', 0);

    // DBの基本情報
    // データベースサーバ アドレス
    define("DB_HOST","***host名***");

    // データベースサーバ ユーザ名
    define("DB_USERNAME","***ユーザ名***");

    // データベースサーバ パスワード
    define("DB_PASSWORD","***パスワード***");

    // データベースサーバ データベース名
    define("DB_DATABASE","***データベース名***");
    define('PDO_DSN','mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';charset=utf8');


    // try {
    //     // DB接続
    //     $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
    //     // PDO->setAttribute()でエラーの属性を設定
    //     // エラーをスロー
    //     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     echo "接続できてます";
    // } catch( PDOException $e ){
    //     // エラー文
    //     echo $e -> getMessage();
    //     exit;
    // }


 ?>

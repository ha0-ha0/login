<?php

    // db情報の読み込み
    require_once('config.php');

    session_start();

    // メールアドレスのチェック
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if ( $email == false ) {
        echo "不正なメールアドレスです。";
        return false;
    }

    try {
        // dbへ接続
        $login_db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
        // エラーをスロー
        $login_db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 入力されたメールアドレスを検索
        $login_email = $login_db->prepare('select * from userList where email = ?');
        $login_email->execute( [ $_POST['email'] ] );
        // 引数のPDO::FETCH_ASSOCは、列名を記述し配列で取り出す設定をしている。配列の最後まで下記を実行し続ける
        // fetch:取り出す。Assoc:Associationで、連想する
        $target = $login_email->fetch(PDO::FETCH_ASSOC);

    } catch ( PDOException $e ) {
        // エラーの場合は「500 Internal Server Error」で終了させる
        header('Content-Type: text/plain; charset=UTF-8', true, 500);
        echo $e -> getMessage();
    }

    //emailがDB内に存在しているか確認
    if (!isset($target['email'])) {
      echo 'メールアドレス又はパスワードが間違っています。';
      return false;
    }

    //パスワードが確認された後にセッションにメールアドレスを渡す
    if ( password_verify( $_POST['password'], $target['password'] ) ) {
        // セッションidを新規作成（上書き）
        session_regenerate_id(true);
        $_SESSION['EMAIL'] = $_POST['password'];
        echo "ログイン成功";
    } else {
        echo "ログイン失敗";
        return false;
    }





 ?>

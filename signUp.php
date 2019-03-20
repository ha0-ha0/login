<?php
    // db情報の読み込み
    require_once('config.php');

    try {
        // dbへ接続
        $login_db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
        // エラーをスロー
        $login_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // テーブルがない場合は新規作成
        // No. 連番 主キー ※連番を振る場合は主キーにしないといけない
        // メールアドレス 最大255文字
        // パスワード 最大255文字
        // 日付
        $login_db->exec(
            'create table if not exists userList(
                id int not null auto_increment primary key,
                email varchar(255),
                password varchar(255),
                created timestamp not null default current_timestamp
            )'
        );

    } catch ( PDOException $e ) {
        // エラーの場合は「500 Internal Server Error」で終了させる
        header('Content-Type: text/plain; charset=UTF-8', true, 500);
        echo $e -> getMessage();
    }

    // メールアドレスのチェック
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if ( $email == false ) {
        echo "不正なメールアドレスです。";
        return false;
    }
    // パスワードのチェック
    if ( preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_POST['password']) ) {
        // 確認用のパスワードと一致しているか
        if ( $_POST['password'] == $_POST['password2']) {
            // 文字列をハッシュ
            $password = password_hash( $_POST['password'], PASSWORD_DEFAULT );
        } else {
            echo "確認用のパスワードと一致していません。";
            return false;
        }
    } else {
        // 正規表現で弾かれた場合
        echo "パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください。";
        return false;
    }


    // dbにパスワードを登録する
    try {
        $user = $login_db -> prepare('insert into userList(email, password) value( ?, ? )');
        $user -> execute( [$email, $password] );
        echo "登録完了です";
    } catch ( PDOException $e ) {
        echo "登録済みです";
    }


 ?>

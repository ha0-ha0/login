<?php

session_start();

if ( isset($_SESSION['EMAIL']) ) {
    echo "ログアウトしました";
} else {
    echo "セッションがタイムアウトしました";
}

//セッションのクリア
$_SESSION = array();
//セッションクッキーも削除
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
//セッションクリア
@session_destroy();


 ?>

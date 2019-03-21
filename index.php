<?php

function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}


session_start();

if ( isset( $_SESSION['EMAIL'] ) ) {
    echo "ようこそ!!". $_SESSION['EMAIL'] . "さん";
    echo '<a href="logout.php">ログアウトはこちらへ</a> ';
    exit;
}


 ?>
<!DOCTYPE html>
<html lang="ja">
 <head>
   <meta charset="utf-8">
   <title>Login</title>
 </head>
 <body>
   <h1>ようこそ、ログインしてください。</h1>
   <form  action="login.php" method="post">
     <label for="email">email</label>
     <input type="email" name="email">
     <label for="password">password</label>
     <input type="password" name="password">
     <button type="submit">Sign In!</button>
   </form>
   <h1>初めての方はこちら</h1>
   <form action="signUp.php" method="post">
     <label for="email">email</label>
     <input type="email" name="email">
     <label for="password">password</label>
     <input type="password" name="password">
     <label for="password2">確認用password</label>
     <input type="password2" name="password2">
     <button type="submit">Sign Up!</button>
     <p>※パスワードは半角英数字をそれぞれ１文字以上含んだ、８文字以上で設定してください。</p>
   </form>
 </body>
</html>

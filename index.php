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
    <title>Login - test</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <!-- original CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>


    <div id="mainWrap">
        <ul class="tabContents">
            <li class="tabTit nico" @click="isSelect('1')" v-bind:class="{active: activeNum == '1' }"><p>ログイン</p></li>
            <li class="tabTit nico" @click="isSelect('2')" v-bind:class="{active: activeNum == '2' }"><p>サインアップ</p></li>
        </ul>

        <div class="mainContents">
            <transition name="fade" mode="out-in">
                <div class="loginArea" v-if="currentNum('1')" key="1" v-bind:class="{active: activeNum == '1' }">
                    <h2 class="tit nico">ようこそ、ログインしてください。</h2>
                    <form  action="login.php" method="post">
                        <input type="email" name="email" class="email" placeholder="email">
                        <input type="password" name="password" class="password" placeholder="password">
                        <button type="submit">Sign In!</button>
                    </form>
                </div>

                <div class="signUpArea" v-if="currentNum('2')" key="2" v-bind:class="{active: activeNum == '2' }">
                    <h2 class="tit nico">初めての方はこちら</h2>
                    <form action="signUp.php" method="post">
                        <input type="email" name="email" placeholder="email">
                        <input type="password" name="password" placeholder="password">
                        <input type="password2" name="password2" placeholder="確認用password">
                        <p>※パスワードは半角英数字をそれぞれ１文字以上含んだ、８文字以上で設定してください。</p>

                        <button type="submit">Sign Up!</button>
                    </form>
                </div>
            </transition>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <!-- vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.min.js"></script>
    <!-- original JS -->
    <script src="js/index.js"></script>
</body>
</html>

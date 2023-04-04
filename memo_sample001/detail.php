<!DOCTYPE html>
<html lang="ja">
<!-- 言語設定　日本語：ja -->

<head>
    <meta charset="utf-8">
    <!-- 文字コード（CharacterSet きゃらくたーせっと）　基本UTF-8でOK -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- 解像度・拡大度合いを設定できる。スマホ画面用に用意されることが多い -->
    <title>詳細</title>
    <!-- ページタイトル。URL欄に出てくる文言 -->
    <meta name="description" content="How to breed Alsatians, tips on proper breeding and information about common issues with this breed.">
    <!-- 検索PickUp時の内容説明。ページ概要 -->
    <meta name="keywords" content="Dogs,Alsatian,Breeding,Dog,Tips,Free,Pet">
    <!-- あんまり使わない。昔は検索で使ってたらしい -->
    <link rel="stylesheet" type="text/css" media="screen" href="styles.css">
    <link rel="stylesheet" type="text/css" media="print" href="printstyles.css">
    <!-- CSS読み込み部分  .cssファイルがないので現在は非対応 -->
    <script src="leaving.js"></script>
    <!-- JavaScript読み込み部分 .jsファイルがないので非対応 -->
</head>

<body>
    <!--　表示させたい内容はbodyに書いていく　-->

    <?php

    include 'setting.php';

    if ($_POST != null) {

        try {
            $db = new PDO('mysql:dbname=memo_sample001_db;host=localhost;charset=utf8', 'root', 'root');
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO `memo`(`title`, `text`) VALUES ('" . $_POST["title"] . "', '" . $_POST["text"] . "')";
            $stm = $db->prepare($sql);
            $stm->execute();
        } catch (PDOException $e) {
            echo 'DB接続エラー！: ' . $e->getMessage();
        }

        $str = "登録しました";
        /* 変数strに代入 */
        echo "<h1>" . $str . "</h1>";

        $array_view = array("title" => "タイトル", "text" => "本文");

        foreach ($_POST as $key => $value) {
            echo $key . "<br>";
            echo $setting[$key]["label"] . "：" . $value . "<br>";
        }
    } else {

        try {
            $db = new PDO('mysql:dbname=memo_sample001_db;host=localhost;charset=utf8', 'root', 'root');
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM memo WHERE id = '" . $_GET["id"] . "' ";
            $stm = $db->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'DB接続エラー！: ' . $e->getMessage();
        }

        foreach ($result as $key) {
            echo "<ul>" . $setting["title"]["label"] .  "<br>" . $key["title"] . "</ul>";
            echo "<ul>" . $setting["text"]["label"] .  "<br>" . $key["text"] . "<br><br>";
        }
    }

    ?>

    <a href="list.php"><br>一覧に戻る</a>

</body>

</html>
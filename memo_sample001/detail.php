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
    include 'db.php';

    if ($_POST != null) {

        $sql_add = "INSERT INTO `memo`(`title`, `text`) VALUES ('" . $_POST["title"] . "', '" . $_POST["text"] . "')";
        $new_add = new Db;
        $result = $new_add->db_connect($sql_add);

        $str = "登録しました";
        /* 変数strに代入 */
        echo "<h1>" . $str . "</h1>";

        $array_view = array("title" => "タイトル", "text" => "本文");

        foreach ($_POST as $key => $value) {
            echo $key . "<br>";
            echo $setting[$key]["label"] . "：" . $value . "<br>";
        }

        // <br>はまとまった文章の改行に使う
    } else {

        $sql_detail = "SELECT * FROM memo WHERE id = '" . $_GET["id"] . "' ";
        $view_detail = new Db;
        $result = $view_detail->db_connect($sql_detail);

        foreach ($result as $key) {
            echo "<p>" . $setting["title"]["label"] .  "</p><p>" . $key["title"] . "</p>";
            // テキストには今後htmlが入る可能性を考慮してdivにしておく
            echo "<p>" . $setting["text"]["label"] .  "</p><div>" . $key["text"] . "</div>";
        }
    }

    ?>

    <p><a href="list.php">一覧に戻る</a></p>

</body>

</html>
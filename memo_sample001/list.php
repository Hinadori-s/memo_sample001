<!DOCTYPE html>
<html lang="ja">
<!-- 言語設定　日本語：ja -->

<head>
    <meta charset="utf-8">
    <!-- 文字コード（CharacterSet きゃらくたーせっと）　基本UTF-8でOK -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- 解像度・拡大度合いを設定できる。スマホ画面用に用意されることが多い -->
    <title>メモ一覧</title>
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

    $str = "メモあぷり";
    /* 変数strに代入 */
    echo "<h1>" . $str . "</h1>";

    $sql_list = "SELECT * FROM memo";
    $title_list = new Db;
    $result = $title_list->db_connect($sql_list);

    echo "<a href = add.php>新規追加</a>";
    echo "<h2>メモ一覧</h2>";

    echo "<ul>";

    foreach ($result as $key) {
        echo "<li><a href = \"detail.php?id=" . $key["id"] .  "\" >" . $key["title"] . "</a></li>";
    }

    echo "</ul>";

    ?>

    <p><a href="list.php">再読み込み</a></p>

</body>

</html>
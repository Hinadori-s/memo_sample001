<!DOCTYPE html>
<html lang="ja">
<!-- 言語設定　日本語：ja -->

<head>
    <meta charset="utf-8">
    <!-- 文字コード（CharacterSet きゃらくたーせっと）　基本UTF-8でOK -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- 解像度・拡大度合いを設定できる。スマホ画面用に用意されることが多い -->
    <title>新規追加</title>
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
    ?>
    <form action="/memo_sample001/detail.php" method="post" class="form-example">
        <!-- action:遷移先ページ　method_POST 見えないように情報を渡す  -->
        <div class="form-example">
            <label for="title"><?php echo $setting["title"]["label"]; ?></label>
            <input type="text" name="title" id="title" required>
        </div>

        <div class="form-example">
            <label for="text"><?php echo $setting["text"]["label"] ?></label>
            <textarea type="text" name="text" id="text" required></textarea>
        </div>

        <div class="form-example">
            <input type="submit" value="Add">
        </div>
    </form>

    <a href="list.php"><br>一覧に戻る</a>


</body>

</html>
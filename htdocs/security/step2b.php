<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Step 2b</title>
</head>

<body>
  <p>安全なサーバでの処理結果</p>
  <button onclick='document.getElementById("bar").innerHTML="&apos; OR TRUE -- "' ;>書き換え（悪）</button>
  <button onclick='document.getElementById("bar").innerHTML="aaa"' ;>書き換え（善）</button>
  <?php
  // ポイント1：送信されたデータはセッションに格納する。
  $foo = $_GET['foo'];
  $_SESSION['foo'] = $foo;
  // ポイント2：特殊文字をエスケープする。（これでXSSは防げるが，この結果をサーバに再送信すると，サーバ側で元に戻す作業が必要になる。）
  echo "<p>送信されたデータ：<span id='bar'>".htmlspecialchars($foo, ENT_QUOTES, 'UTF-8')."</span></p>";
  // ポイント3：データは再送信しない。
  echo "<a href='step3b.php'>安全なサーバ2へ</p>";
  ?>
</body>

</html>
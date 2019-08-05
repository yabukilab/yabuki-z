<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Step 2a</title>
</head>

<body>
  <?php echo getenv('aaaaa') ? "AAA":"BBB"; ?>
  <p>実験1：そのまま「Step 3a」へ</p>
  <p>実験2：クライアント側で<button onclick='document.getElementById("bar").value="&apos; OR TRUE -- "' ;>書き換え</button>てから「Step 3a」へ</p>
  <?php
  $foo = $_GET['foo'];
  echo "<p>送信されたデータ：${foo}</p>"; // 送信されたデータをそのまま使ってはいけない。
  echo "<form action='step3a.php' method='GET'>";
  echo "<input id='bar' name='foo' value='$foo' />"; // 送信されたデータをそのまま使ってはいけない。
  echo "「書き換え」ボタンを押してから，<input type='submit' value='Step 3a' />";
  echo "</form>";
  ?>
</body>

</html>
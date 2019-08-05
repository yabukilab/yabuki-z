<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Step 3a</title>
</head>

<body>
  <p>送信されたデータをそのままSQL文に埋め込んで実行</p>
  <?php
  require 'db.php';
  
  $foo = $_GET['foo'];
  $sql = "SELECT * FROM memos WHERE memo = '$foo'"; // 送信されたデータをそのままSQL文に埋め込むと，SQLインジェクションの餌食になる。
  echo "<p>実行されるSQL文：<code>".htmlspecialchars($sql, ENT_QUOTES, 'UTF-8')."</code></p>";
  $result = $db->query($sql);
  echo "<p>実行結果</p>";
  echo '<ul>';
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id'];
    $memo = htmlspecialchars($row['memo'], ENT_QUOTES, 'UTF-8');
    echo "<li>${id}：${memo}</li>";
  }
  ?>
</body>

</html>
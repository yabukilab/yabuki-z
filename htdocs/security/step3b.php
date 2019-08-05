<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Step 3b</title>
</head>

<body>
  <?php
  require 'db.php';
  
  $foo = $_SESSION['foo'];
  $stmt = $db->prepare("SELECT * FROM memos WHERE memo = ?");
  $stmt->execute(array($foo));
  echo "<p>実行結果</p>";
  echo '<ul>';
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id'];
    $memo = htmlspecialchars($row['memo'], ENT_QUOTES, 'UTF-8');
    echo "<li>${id}：${memo}</li>";
  }
  ?>
</body>

</html>
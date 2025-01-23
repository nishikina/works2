<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>削除</title>
</head>
<body>

<?php

if (!isset($_GET['no']) || !is_numeric($_GET['no'])) {
    exit('パラメータエラー');
}

try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=phpdb;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $no = $_GET['no'];

    $stmt = $pdo->prepare('UPDATE messages SET deleted = TRUE WHERE no = :no');
    $stmt->bindParam(':no', $no, PDO::PARAM_INT);
    $stmt->execute();

    // 削除成功をアラートで通知
    echo '<script>alert("メッセージを削除しました。"); window.location.href = "index.php";</script>';

} catch (PDOException $e) {
    exit('データの更新中にエラーが発生しました。');
}

$pdo = null;

?>


</body>
</html>
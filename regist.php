<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">


<title>投稿完了</title>

</head>
<body>

<?php
// フォームから送信されたデータを取得
$name = $_POST['name'];
$message = $_POST['message'];
$imagePath = '';

// 画像がアップロードされた場合は、一時ファイルから保存先に移動する
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    $uploadPath = $uploadDir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
        $imagePath = $uploadPath;
    }
}

// データベースに接続
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=phpdb;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // データベースに投稿を挿入
    $stmt = $pdo->prepare('INSERT INTO messages (name, message, image) VALUES (?, ?, ?)');
    $stmt->execute([$name, $message, $imagePath]);
} catch (PDOException $e) {
    exit('データを登録できませんでした。');
}

// 投稿が完了したら、再度掲示板ページにリダイレクトする
header('Location: index.php');
exit;


?>

</body>
</html>

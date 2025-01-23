<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=phpdb;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $no = isset($_GET['no']) ? (int)$_GET['no'] : 0;

    $stmt = $pdo->prepare('SELECT * FROM messages WHERE no = ?');
    $stmt->execute([$no]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        exit('指定されたデータがありません。');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // データの更新処理
        $name = $_POST['name'];
        $message = $_POST['message'];

        // 画像更新処理
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image_path = 'uploads/' . basename($_FILES['image']['name']);
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
                exit('画像のアップロードに失敗しました。');
            }
            // データベースに画像パスを保存
            $stmt = $pdo->prepare('UPDATE messages SET name = :name, message = :message, image = :image WHERE no = :no');
            $stmt->bindParam(':image', $image_path, PDO::PARAM_STR);
        } else {
            // 画像がアップロードされていない場合は、画像カラムを更新しない
            $stmt = $pdo->prepare('UPDATE messages SET name = :name, message = :message WHERE no = :no');
        }

        // 他のカラムを更新
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':no', $no, PDO::PARAM_INT);
        $stmt->execute();

        // リダイレクト
        echo '<script>window.location.href = "index.php";</script>';
    }

} catch (PDOException $e) {
    exit('データベースに接続できませんでした。');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/index.css">
<script src="js/index.js"></script>
<title>編集</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data" onsubmit="showAlert('編集しました！')">
  <h2>投稿内容 - 編集</h2>
  <input type="hidden" name="no" value="<?php echo $data['no']; ?>">
  <label for="name">名前：</label><br />
  <input type="text" id="name" name="name" size="30" value="<?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?>" required /><br />
  <label for="message">メッセージ：</label><br />
  <textarea id="message" name="message" cols="30" rows="5" required><?php echo htmlspecialchars($data['message'], ENT_QUOTES); ?></textarea><br />
  <label for="image">画像を選択：</label><br />
  <input type="file" id="image" name="image" accept="image/*" onchange="handleFileSelect(event)"><br /> <!-- 画像ファイルのみを受け付ける -->
  <img id="preview" src="<?php echo htmlspecialchars($data['image'], ENT_QUOTES); ?>" style="max-width: 300px; <?php echo empty($data['image']) ? 'display: none;' : ''; ?>"><br> <!-- 画像プレビュー -->
  <br />
  <input type="submit" value="更新する" />
</form>

</body>
</html>

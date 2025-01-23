<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/index.css">
<script src="js/index.js"></script>
<title>niX</title>

<style>
  /* 左側のロゴと更新ボタン用のスタイル */
  #sidebar {
    float: left;
    max-width: 150px; /* 固定幅ではなく、最大幅を設定 */
    width: 20%; /* 幅をパーセンテージで指定 */
    min-width: 150px; /* 必要に応じて最小幅を設定 */
    height: 100%;
    background-color: #f0f0f0;
    padding: 70px;
    position: relative;
}  

  #logo {
    margin-bottom: 20px;
    margin-left: 5px;
    max-width: 150px; /* 変更：ロゴの最大幅 */
    border-radius: 100px;
  }

  #niX {
    position: absolute; /* 追加：ロゴ内に絶対配置 */
    top: 50%; /* 追加：ロゴの中央に配置 */
    left: 240px; /* 追加：niXの位置調整 */
    transform: translateY(-50%); /* 追加：垂直方向の中央配置 */
    font-size: 70px; /* 追加：niXiのフォントサイズ */
    font-weight: bold; /* 追加：niXiのフォントの太さ */
    color: #007bff; /* 追加：niXiのテキスト色 */
  }

  #updateBtn {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    position: absolute; /* 追加：更新ボタンの絶対位置指定 */
    top: 80%; /* 追加：更新ボタンの垂直位置調整 */
    left: 50px; /* 変更：更新ボタンの水平位置調整 */
    transform: translateY(-50%); /* 追加：更新ボタンの垂直方向の中央配置 */
  }

  #updateBtn:hover {
    background-color: #0056b3;
  }

  @media screen and (max-width: 1430px) {
  #sidebar {
    width: 150px; /* 幅を固定幅に戻す */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: auto;
    padding: 20px;
    background-color: #f0f0f0;
    z-index: 1000; /* ページのコンテンツよりも上に配置 */
  }

  #logo {
    max-width: 100%; /* ロゴの最大幅を100%に設定 */
    margin-bottom: 5px;
  }

  #niX {
    position: static; /* niXの位置を元に戻す */
    font-size: 70px; /* niXのフォントサイズを調整 */
    margin-bottom: 15px; /* niXと更新ボタンの間隔を調整 */
    margin-left: 25px;
  }

  #updateBtn {
    position: static; /* 更新ボタンの位置を元に戻す */
    display: block;
    width: auto;
    padding: 5px 10px;
    font-size: 16px;
    margin-top: 10px; /* 更新ボタンとフォームの間隔を調整 */
    text-align: center;
  }

  #content {
    margin-left: 170px; /* コンテンツの左マージンを調整 */
  }
}


</style>
</head>
<body>

<!-- 左側のロゴと更新ボタン -->
<div id="sidebar">
  <img id="logo" src="image/logo.png" alt="ロゴ">  
  <span id="niX">niX</span> <!-- 追加：niXのテキスト -->
  <a id="updateBtn" href="index.php">更新</a>
</div>

<!-- 右側の投稿フォームと投稿内容一覧 -->
<div id="content">
  <form action="regist.php" method="post" enctype="multipart/form-data" onsubmit="showAlert('送信しました！')">
    <h2>投稿内容</h2>
    <label for="name">名前：</label><br />
    <input type="text" id="name" name="name" size="30" value="" required /><br />
    <label for="message">メッセージ：</label><br />
    <textarea id="message" name="message" cols="30" rows="5" required></textarea><br />
    <label for="image">画像を選択：</label><br />
    <input type="file" id="image" name="image" accept="image/*" onchange="handleFileSelect(event)"><br />
    <img id="preview" src="" style="display:none; max-width: 300px;"><br>
    <br />
    <input type="submit" value="投稿する" />
  </form>

  <!-- 投稿内容一覧 -->
  <?php
  try {
      $pdo = new PDO('mysql:host=127.0.0.1;dbname=phpdb;charset=utf8', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      exit('データベースに接続できませんでした。');
  }

 // フォームからの投稿処理
try {
  // 名前、メッセージ、画像、投稿日時をデータベースに挿入
  $stmt = $pdo->prepare('INSERT INTO messages (name, message, image, created) VALUES (:name, :message, :image, now())');
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':message', $message, PDO::PARAM_STR);
  $stmt->bindParam(':image', $imagePath, PDO::PARAM_STR);
  // 他の処理...
} catch (PDOException $e) {
  exit('投稿に失敗しました。');
}

// 投稿内容一覧表示部分
try {
  $stmt = $pdo->prepare('SELECT * FROM messages WHERE deleted = FALSE ORDER BY no DESC LIMIT 15');
  $stmt->execute();

  // 投稿内容一覧表示部分
while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo "<p>\n";
  echo '<strong>[No.' . $data['no'] . '] ' . htmlspecialchars($data['name'], ENT_QUOTES) . ' ' . date('Y-m-d H:i:s', strtotime($data['created'])) . "</strong><br />\n"; // 日付と時刻を表示
  echo "<br />\n";
  echo nl2br(htmlspecialchars($data['message'], ENT_QUOTES));
  if (!empty($data['image'])) {
      echo '<br>';
      echo '<img src="' . htmlspecialchars($data['image'], ENT_QUOTES) . '" alt="投稿画像"><br>';
  }
  echo "<br />\n";
  // 削除リンク
  echo '<a href="delete.php?no=' . $data['no'] . '">削除</a> | ';
  // 編集リンク
  echo '<a href="edit.php?no=' . $data['no'] . '">編集</a>';
  echo "</p>\n";
}

} catch (PDOException $e) {
  exit('データの取得中にエラーが発生しました。');
}

  $pdo = null;

  ?>
</div>

</body>
</html>

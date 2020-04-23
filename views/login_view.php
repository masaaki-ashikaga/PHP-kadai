<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/index.css">

  <title>ログイン画面</title>
</head>

<body>
  <h1>ログイン</h1>
  <form action="../login/login.php" method="POST">
    <p>メールアドレス：<input type="text" name="email"><?php echo $errs['email']; ?></p>
    <p>パスワード：<input type="password" name="password"><?php echo $errs['password']; ?></p>
    <p><input type="submit" value="登録する"></p>
    <p><a href="signup.php">新規登録</a></p>
  </form>

</body>
</html>
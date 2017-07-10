<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>登録情報確認</title>
  </head>
  <body>
<?php
$dsn='mysql:dbname=test_db;host=localhost';
$user='root';
$password='onefami';
$dbh=new PDO($dsn,$user,$password);
$dbh->query('SET NAMES UTF-8');

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

if($name=='' ||$email=='' ||$password==''){
  if($name==''){
    print '登録名が入力されていません。<br>';
  }
  if($email==''){
    print 'emailが入力されていません。<br>';
  }
  if($password==''){
    print 'passwordが入力されていません。<br><br>';
    print '<form><input type="button" onclick="history.back()" value="戻る"></form>';
  }
}else{
  print '<form method="post" action="registry-succcess.php">';
  print '登録情報をご確認ください<br/>';
  print '登録名:'.$name;
  print '<br/>';
  print 'email:'.$email;
  print '<br/>';
  print 'password:'.$password;
  print '<br/>';
  print '<br/>';
  print '<input type="button" onclick="history.back()" value="戻る">
  <input type="submit" value="OK">';
  print '<input type="hidden" name="name" value="'.$name.'">';
  print '<input type="hidden" name="email" value="'.$email.'">';
  print '<input type="hidden" name="password" value="'.$password.'">';
  print '</form>';

$sql='INSERT INTO users(name,email,password) VALUES("'.$name.'","'.$email.'","'.$password.'")';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;
}


 ?>
  </body>
</html>

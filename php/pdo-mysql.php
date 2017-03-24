<?php

/* 连接 */
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', 'root', '123456');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->exec('set names utf8');
} catch (PDOException $e) {
    echo "Error!:" . $e->getMessage() . PHP_EOL;
    die();
}

/* 添加 */
$sql = "INSERT INTO `user` (`login`, `password`) VALUES (:login, :password)";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(':login' => 'kevin2', ':password' => password_hash('blabla', PASSWORD_DEFAULT)));
$id = $dbh->lastinsertid();
echo $id . PHP_EOL;

/* 修改 */
$sql = "UPDATE `user` SET `password` = :password WHERE `id` = :id";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(':id' => $id, ':password' => password_hash('gogogo', PASSWORD_DEFAULT)));
echo $stmt->rowCount() . PHP_EOL;

/* 查询 */
$login = 'kevin%';
$sql = "SELECT * FROM `user` WHERE `login` LIKE :login";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(':login' => $login));
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    print_r($row);
}
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));

/* 删除 */
$sql = "DELETE FROM `user` WHERE `login` LIKE 'kevin%'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
echo $stmt->rowCount();

/* 事务 */
try {
    $dbh->beginTransaction(); //开启事务
    $dbh->exec("INSERT INTO `user` (`login`, `password`) VALUES ('Joe', 'password1')");
    $dbh->exec("INSERT INTO `user` (`login`, `password`) VALUES ('Peter', 'password2')");
    $dbh->commit(); //提交事务
} catch (Exception $e) {
    $dbh->rollBack(); //错误回滚
    echo "Failed:" . $e->getMessage() . PHP_EOL;
}
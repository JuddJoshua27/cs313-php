<?php 

try
{
  $user = 'ta_user';
  $password = 'pa55word';
  $db = new PDO('pgsql:host=localhost;dbname=scripture', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
} 


$book = $_GET['book'];
echo $book;

$stmt = $db->prepare('SELECT * FROM scriptures WHERE book=:book');
$stmt->bindValue(':book', $book, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Week 3 Team Activity</title>
    </head>
    <body>
        <h1>Scripture Resources</h1>
    
    <?php
        var_dump($rows);
        foreach ($rows as $row)
{ echo '<p><b>'.$row['book'].' ';
  echo $row['chapter'].':';
  echo $row['verse'].'</b> - "';
    echo $row['content'].'"</p>';

}
?>

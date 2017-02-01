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

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Week 3 Team Activity</title>
    </head>
    <body>
        <h1>Scripture Resources</h1>
        
    <?php foreach ($db->query('SELECT * FROM scriptures') as $row) 
    
    
{ echo '<p><b>'.$row['book'].' ';
  echo $row['chapter'].':';
  echo $row['verse'].'</b> - "';
    echo $row['content'].'"</p>';

}
        
        ?>
        <form action='scr_results.php' method="get">
        <label for='book'>Enter book name:</label><input id='book' name='book' type='text'/>   
        <input type= 'submit'  value='Search' />
                           </form>
        
        
    </body>
</html>
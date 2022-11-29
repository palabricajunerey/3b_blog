<?php 
if(!$pwede){
        header("location: index.php");
    }
try{
    $host = "localhost";
    $db_name = "3b_blog";
    $user = "root";
    $password = "";

    $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    // if($conn == true){
    //     echo 'Database Connected!';
    // }
}catch(PDOException $e){
    echo $e->getMessage();
}

?>
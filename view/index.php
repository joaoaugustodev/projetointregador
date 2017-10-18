<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: /projetointregador/');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <h1>ADMIN</h1>
    
    <?php 
        echo $_SESSION['user'];
    ?>

    <a href="../db/logout.php">Logout</a>
</body>
</html>
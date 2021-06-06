<?php include 'db.php'; ?>

<?php 

$query = "SELECT * FROM messages ORDER BY date DESC;";
$messages = mysqli_query($conn, $query);

if (isset($_GET['action']) && isset($_GET['id'])){
    $id=$_GET['id'];

   $query = "DELETE FROM messages where serial_number = $id";

   if(!mysqli_query($conn, $query)){

        die(mysqli_error($conn));

   }

   else{

        header("Location: message_app.php?success=Message%20Removed");

   }
}

    if(isset($_GET['error'])){

    $error= $_GET['error'];

    }
    
    if(isset($_GET['success'])){

    $success= $_GET['success'];

    }

?>


<html>

    <head>
        <title> MESSAGE APP </title>
        <link rel="stylesheet" href= "message.css">
        <script src="https://kit.fontawesome.com/2570b77c47.js" crossorigin="anonymous"></script>
    </head>

<body>

    <div class="container">


    <form method="POST" action="process.php">
        <h1> MESSAGE APP </h1>
        <?php if(isset($error)): ?>
	    <div class= "alert" ><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if(isset($success)): ?>
	    <div class= "success" ><?php echo $success; ?></div>
        <?php endif; ?>

        <input name="user" type="text" placeholder="username">
        <input name="message" type ="text" placeholder="enter text">
        <button type="submit"> submit </button>
    </form>

    <hr>

        <ul>
            <?php while ($row = mysqli_fetch_assoc($messages)): ?>
            <!--li>This message is static | radhika kakkar | [june-2021]</li>
            <li>This message is static | aahan kumar | [june-2020]</li-->
            <li> <?php echo $row['message']; ?> | <?php echo $row['name']; ?> | <?php echo $row['date']; ?> - <a href= "message_app.php?action=delete&id=<?php echo $row['serial_number']; ?>"> <i class="fa fa-scissors" style="color:red; padding: 5px;"></i> </a> </li>

            <?php endwhile; ?> 

        </ul>

    </div>

        <footer class="footer">
            MessageApp &copy; 2021
        </footer>

</body>
</html>

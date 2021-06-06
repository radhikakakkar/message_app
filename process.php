<?php include 'db.php'; ?>

<?php 

//if(isset($_POST['message']) && isset($_POST['user'])

    if( !empty($_POST['message']) && !empty($_POST['user'])){

        $message= mysqli_real_escape_string($conn, $_POST['message']);
        $user= mysqli_real_escape_string($conn, $_POST['user']);

        $query = "INSERT INTO messages(message, name) VALUES('$message', '$user');";

        if(!mysqli_query($conn, $query)){

            die(mysqli_error($conn));

        }

        else{

        header("Location: message_app.php?success=Message%20Added");
	    }

    }   
    else{

        //echo ("not submitted");
    
    header("Location: message_app.php?error=Please%20Fill%20All%20Values");

    }
    



    



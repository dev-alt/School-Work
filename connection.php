<?php
// Our Database credentials username and passwords

    $user = "a9957173_a9957173";
    $pw = "qD)ZWCYL2BPI";
    $db = "a9957173_scpdb";

// Create connection
    $conn = new mysqli('localhost', $user, $pw, $db);
    
// Check connection
//    if ($conn->connect_error) {
//        die("Connection failed: " . $conn->connect_error);
//    }
//    echo "Connected successfully";



    // variable that returns all records in the database
    $all_records = $conn->query("select * from scp");

// code for insert data from our create form
// check if submit value has been sent via POST

    if(isset($_POST['submit']))
    {
        // create variables from our form post data
        $item = mysqli_real_escape_string($conn, $_POST['item']);
        $object_class = mysqli_real_escape_string($conn, $_POST['object_class']);
        $image = mysqli_real_escape_string($conn, $_POST['image']);
        $special_containment_procedures = mysqli_real_escape_string($conn, $_POST['special_containment_procedures']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $addendum = mysqli_real_escape_string($conn, $_POST['addendum']);

        
        // create sql command to insert above values into our DB
        $insert = "INSERT INTO scp (item, object_class,special_containment_procedures, description, addendum) VALUES ('$item','$object_class','$special_containment_procedures','$description', '$addendum')";

        if($conn->query($insert) === TRUE)
        {
            echo "
            <h1>Record added successfully</h1>
            <p><a href='index.php'>Return to index page</a></p>
            ";
        }
        else
        {
            echo "
                <h1>Error submitting data</h1>
                <p>{$conn->error()}</p>
                
            ";
        }
    } // end isset POST ( insert or create record )
    
    
     if(isset($_POST['update']))
    {
        // Create variables from our form post data
            $id = $_POST['id'];
        
        
        // using escape method (procedule Style) to allow certain characters to be inserted into DB
            $item = mysqli_real_escape_string($conn, $_POST['item']);
            $object_class = mysqli_real_escape_string($conn, $_POST['object_class']);
            $image = mysqli_real_escape_string($conn, $_POST['image']);
            $special_containment_procedures = mysqli_real_escape_string($conn, $_POST['special_containment_procedures']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $addendum = mysqli_real_escape_string($conn, $_POST['addendum']);
        
        // create a sql update command
        $update = "update scp set item='$item', object_class='$object_class', special_containment_procedures='$special_containment_procedures', description='$description', addendum='$addendum' where id='$id'";
        
        if($conn->query($update) === TRUE)
        {
            echo "
                <h1>Record updated successfully</h1>
                <p><a href='index.php'>Return to index page.</a></p>
            ";
        }
        else
        {
            echo "
                <h1>Record did not update</h1>
                <p>{$conn->error()}</p>
                <p><a href='index.php'>Return to index page.</a></p>
            ";
        }
        
    } // end isset POST (update record)



//delete record function
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        // delete sql command
        $del = "delete from scp where id=$id";
        
        if($conn->query($del) === TRUE)
        {
            echo "
            <h1>Record Deleted</h1>
            <p><a href='index.php'>Back to Index Page</a></p>
            ";
        }
        else
        {
            echo "
            <h1>Error deleting record</h1>
            <p>{$conn->error()}</p>
            <p><a href='index.php'>Back to Index Page</a></p>
            ";
        }
    } //end of delete

?>
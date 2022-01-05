<?php

session_start();

include('config.php'); 



if(isset($_POST['add'])){

    $item = mysqli_real_escape_string($connection, $_POST['item']);
    $amount = mysqli_real_escape_string($connection, $_POST['amount']);
    $petsa = mysqli_real_escape_string($connection, $_POST['petsa']);
    

    $query = "INSERT INTO tbl_expenses (item,amount,petsa) 
                VALUES 
                ('$item','$amount','$petsa')";
    $query_run = mysqli_query($connection,$query);

    if($query_run)

    {

    $_SESSION['success'] = "Added Successfully";
    header('Location: index.php');

    }else{

    $_SESSION['failed'] = "Error Adding Data!";
    header('Location: index.php');
    }
}


//code for deleting customer data
if(isset($_POST['delete_btn'])){

    $rid = $_POST['delete_id'];
    

    $query = "DELETE FROM tbl_expenses WHERE id ='$rid' LIMIT 1";


    $query_run = mysqli_query($connection,$query);

    if($query_run){
           
        $_SESSION['success'] = "Data Deleted Successfully";
        header("Location: index.php");

    }else{
        $_SESSION['failed'] = "Error Deleting Data";
        header("Location: index.php");
    }
}





//code for updating resident data
if(isset($_POST['update_bt'])){

    $id = $_POST['edit_id'];
    $item = mysqli_real_escape_string($connection, $_POST['item']);
    $amount = mysqli_real_escape_string($connection, $_POST['amount']);
    $petsa = mysqli_real_escape_string($connection, $_POST['petsa']);
   
    


        $query = "UPDATE tbl_expenses SET item='$item',amount='$amount',petsa='$petsa' WHERE id ='$id' LIMIT 1";

        $query_run = mysqli_query($connection,$query);

        if($query_run)
        {
            $_SESSION['success'] = "Data Updated Successfully";
            header('Location: index.php');
        }
        else
        {
            $_SESSION['failed'] = "Error Updating Data";
            header('Location: index.php');

        }   
}



?>
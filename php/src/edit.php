<?php

	session_start();
	include('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PERSONAL EXPENSES RECORD</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
</head>
<body>

<div class="container">

<br><br><br>
	<h1> PERSONAL EXPENSES RECORD </h1>

	<?php
		if (isset($_SESSION['success']) && $_SESSION['success'] !='')
		{
		echo '<div class="alert alert-success" role="alert">
		'.$_SESSION['success'].'</div>';
		unset($_SESSION['success']);
		}

		if (isset($_SESSION['failed']) && $_SESSION['failed'] !='')
		{
		echo '<div class="alert alert-danger" role="alert"> '.$_SESSION['failed'].'</div>';
		unset($_SESSION['failed']);
		}
	?>



<br><br>

<h3> UPDATE PERSONAL EXPENSES RECORD </h3>
	

<div class="modal-body">

<?php
            if(isset($_POST['edit_btn'])){
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM tbl_expenses WHERE id ='$id' ";
                $query_run = mysqli_query($connection,$query);

                foreach($query_run as $row){   
        ?>

                        <form role="form" action="crud.php" method="POST">
                            <input type="hidden" name ="edit_id" value="<?php echo $row['id']; ?>">

                                        <!-- Input Fields -->
                                        <div class="form-group">
                                        <label for="usr">ITEM:</label>
                                        <input type="text" name="item" class="form-control" id="usr" style="text-transform: capitalize;" value="<?php echo $row['item']; ?>">
                                        </div>

                                        <div class="form-group">
                                        <label for="usr">AMOUNT:</label>
                                        <input type="text" name="amount" class="form-control" id="usr" style="text-transform: capitalize;" value="<?php echo $row['amount']; ?>">
                                        </div>
                                       
                                       <div class="form-group">
                                        <label for="usr">DATE:</label>
                                        <input type="date" name="petsa" class="form-control" id="usr" style="text-transform: capitalize;" value="<?php echo $row['petsa']; ?>">
                                        </div>

                                                    </script> <br>
                                            <a href="index.php" class="btn btn-danger">Cancel</a>
                                            <button type="submit" name="update_bt" class="btn btn-primary">Update</button>


                        </form>

        <?php
                }
                
            }
        ?>

		  	
  
</div>


</body>
</html>


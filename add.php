<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

//Create connection
$conn = new mysqli($host,$username,$password,$dbname);

//Check connection
if($conn->connect_error){
   die("Connection Failed" . $conn->connect_error);
}

//Variable Declaration
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$btn = $_POST['btn'];

if($btn == "submit"){
    //Prepare and bind for Insert
    $insert = $conn->prepare("INSERT INTO customer(firstname,lastname,address,mobile) VALUES(?,?,?,?)");
    $insert->bind_param("sssi",$firstname,$lastname,$address,$mobile);

//Execute the Insert statement
if($insert->execute()){
    echo "Details are submitted successfully";
}
else{
    echo "Failed to submit:" . $insert_error;
}

//Close the insert statement    
$insert->close();
}
$conn->close();




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrudOperation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
      <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="width: 58rem;">
                <div class="card-header">
                    <h1>Customer Details</h1>
                </div>
                    <div class="card-body">
                    <form action="add.php" method="POST">
                        
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" placeholder="Enter FirstName">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Enter LastName">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter Address">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mobile</label>
                            <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile">
                        </div>
                       
                        <input type="submit" class="btn btn-primary" name="btn" value="submit">
                    </form>
                        
                    </div>
                </div>
            </div>
        </div>
      </div>
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sachi_db";

$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$description = "";
$price = "";
$quantity = "";

$errorMessage ="";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["Name"];
    $description = $_POST["Description"];
    $price = $_POST["Price"];
    $quantity = $_POST["Quantity"];

    if(empty($name) || empty($description) || empty($price) || empty($quantity)){  
        $errorMessage = "All fields are required";
    } else {
        // add new student in the database
        $sql = "INSERT INTO products (Name, Description, Price, Quantity) " .
               "VALUES ('$name' , '$description' , '$price' , '$quantity')";
        $result = $connection->query($sql); 

        if(!$result){
            $errorMessage = "Invalid query: " .$connection->error;
        } else {
            $successMessage = "Student added correctly";
            
            header("Location: /ActsAppDev/index.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
  
</head>
<body>
    <div class="container my-5">
        <h2> Product Information</h2>  
         <?php
         if (!empty($errorMessage)){
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
         }
         
         ?>

        <form method="post">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-6">
             <input type="text" class="form-control" name="Name" value="<?php echo $name; ?>">   
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-6">
             <input type="text" class="form-control" name="Description" value="<?php echo $description; ?>">   
            </div>
          </div>
            <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Price</label>
            <div class="col-sm-6">
             <input type="text" class="form-control" name="Price" value="<?php echo $price; ?>">   
            </div>
            </div>
            <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Quantity</label>
            <div class="col-sm-6">
             <input type="text" class="form-control" name="Quantity" value="<?php echo $quantity; ?>">   
            </div>
            </div>

            <?php
            if (!empty($successMessage)){
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            } 
            ?>

       <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <br>
            <br>
       <button type="submit" class="btn btn-primary">Submit</button>
       </div>
       <div class="col-sm-3 d-grid">
        <br>
       <a class="button xxx" href="/ActsAppDev/index.php" role="button">Cancel</a>
       </div>
       </div>
        </form> 
    </div>
</body>
</html>

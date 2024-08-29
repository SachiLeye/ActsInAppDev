<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    
    </head>
    <style>
        table,th,td{
            border: 1px solid black;
        }
    </style>
<body>
    <div class= "container" my-5>
        <h2>PRODUCTS</h2>
        <a class="button xxx" href="/ActsAppDev/insert.php" role="button">Add Products</a><br><br>

    <table class="table">
             <thead>
              <tr>
                <th> Id</th>
                <th> Name</th>
                <th> Description</th>
                <th> Price</th>
                <th> Quantity</th>
                <th>Action</th>
              </tr>
             </thead>


             <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "sachi_db";

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }
                $sql = "SELECT * FROM products";
                $result = $connection->query($sql);

                if(! $result) {
                    die("Invalid query: ". $connection->error);                   
                }

                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[ID]</td>
                    <td>$row[Name]</td>
                    <td>$row[Description]</td>
                    <td>$row[Price]</td>
                    <td>$row[Quantity]</td>
                    <td>
                        <a class='btn btn-primary btn-sm'href='update.php?ID=$row[ID]'> Edit</a>
                        <a class='btn btn-danger btn-sm'href='delete.php?ID=$row[ID]'> Delete </a>
                    </td>
                </tr>

                    ";
                }
                
                ?>
             </tbody>
</table>
    </div>
    <br>

   
   
</body>
</html>

    
<?php
$insert = false;
//Connect to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

// Create Connection
$conn = mysqli_connect($servername,$username,$password,$database);

// Die if connection was not successful
if(!$conn){
    die("Sorry we faild to connect: ". mysqli_connect_error());
}else{
    echo "Database Connection was successful <br>";
}

// create records
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST["name"];
    $age = $_POST["age"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];

    //sql query Execution
    $sql = "INSERT INTO `contacts` (`name`,`age`,`mobile`,`address`) VALUES ('$name','$age','$mobile','$address')";
    $result = mysqli_query($conn, $sql);

    //tag lables
    if($result){
        //echo "Recordes has been inserted successfully <br>";
        $insert = true;

    }else{
        echo"Record was not inserted successfully because of this error ------>".mysqli_error($conn);
    }


}



?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

    <title>PHP CRUD</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PHP CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <?php
    if ($insert){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>successul</strong> Recordes has been inserted successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    ?>




    <!-- Form start from here -->
    <div class="container my-4">
        <h2>Contact Form</h2>
        <form class="row g-3" action="/phpcrud/index.php" method="post">
            <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" aria-label="First name" name="name" id="name" Required>
            </div>
            <div class="col-12">
                <label for="mobile" class="form-label">Mobile Number</label>
                <input type="tel" class="form-control" name="mobile" id="mobile" pattern="[0-9]{10}" maxlength="10"
                    Required>
            </div>
            <div class="col-12">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" pattern="[0-9]{3}" maxlength="3" Required>
            </div>

            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="address" Required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <!-- Now here is main data -->
    <div class="container my-4">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
         $sql = "SELECT * FROM `contacts`";
         $result = mysqli_query($conn , $sql);
         $sno = 0;
         while($row = mysqli_fetch_assoc($result)){
             $sno = $sno+1;

          echo "<tr>
      <th scope='row'>".$sno."</th>
      <td>".$row['name']."</td>
      <td>".$row['age']."</td>
      <td>".$row['mobile']."</td>
      <td>".$row['address']."</td>
      <td>Action</td>
    </tr>";
         }
        ?>

            </tbody>
        </table>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->
         
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
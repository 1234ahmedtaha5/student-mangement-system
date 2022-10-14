
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,400&family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
    <title>stusent mangement</title>
</head>

<body >
    <?php 
    // connect to database
    $host="localhost";
    $user="root";
    $pass="";
    $db="student mangement";
    $conn=mysqli_connect($host,$user,$pass,$db);
    $result=mysqli_query($conn,"select * from students");
    //button variable
    $std_id="";
    $std_name="";
    $std_address="";
    if(isset($_POST["std_id"])){
        $std_id=$_POST['std_id'];
    }
    if(isset($_POST["std_name"])){
        $std_name=$_POST["std_name"];
    }
    if(isset($_POST["std_address"])){
        $std_address=$_POST['std_address'];
    }
    $sqls="";
    if(isset($_POST['add'])){
        $sqls="insert into students value('$std_id','$std_name','$std_address')";
        mysqli_query($conn,$sqls);
        header("location:index.php");
    } 
    if(isset($_POST['delete'])){
        $sqls="delete from students where std_name='$std_name'";
        mysqli_query($conn,$sqls);
        header("location:index.php");
    } 

    ?>
    <div id="mother">
        <form method="POST">
            <aside>
                <div id="div">
                    <img src="Organization-Student-Management-System.jpg" class="w-75 a" alt="logo">
                    <h3>manger control panel</h3>
                    <label for="" class="form-label fs-4">student id:</label><br>
                    <input type="text"  class="form-control w-100 in"  name="std_id"><br>
                    <label for="" class="form-label fs-4">student name:</label><br>
                    <input type="text"  class="form-control w-100 in"  name="std_name"><br>
                    <label for="" class="form-label fs-4">student address:</label><br>
                    <input type="text"  class="form-control w-100 in" name="std_address"><br><br>
                    <button name="add" class="btn btn-info">ADD</button>
                    <button name="delete" class="btn btn-info">delete</button>
                </div>
            </aside>
            <main>
                <table id="tbl" class="table table-dark table-striped">
                    <tr>
                        <th>studen id</th>
                        <th>student name</th>
                        <th>student address</th>
                    </tr>
                    <?php 
                    while($row=mysqli_fetch_array($result)){
                        echo  "<tr>";
                        echo  "<td>".$row['std_id']."</td>";
                        echo  "<td>".$row['std_name']."</td>";
                        echo  "<td>".$row['std_address']."</td>";
                        echo  "</tr>";
                    }
                    ?>
                    
                </table>
            </main>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
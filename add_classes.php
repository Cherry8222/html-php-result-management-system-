
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/studentresult.css">
    
    <title>Document</title>
    <style>
        .main{
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            padding: 20px;
            margin: 7% 20% 0 20%;
        }
    </style>
</head>
<body>
   
       <div class="dash">

        <h2 class="dashboardtitle">ADMIN DASHBOARD</h2>

        
        <div class="log">
            <a href="logout.php" Class="nn">  <button type="submit" class="button-17 topbtn newbtn">LOGOUT </button></a>
        </div>
        </div>
    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="add-class">
        <form action="" method="post">
            <fieldset>
                <legend>Add Class</legend>
                <input type="text" name="class_name" placeholder="Class Name">
                <input type="text" name="class_id" placeholder="Class ID">
                <input type="submit" value="Submit">
            </fieldset>        
        </form>
    </div>
    
</body>
</html>

<?php 
	include('init.php');
    include('session.php');

    if (isset($_POST['class_name'],$_POST['class_id'])) {
        $name=$_POST["class_name"];
        $id=$_POST["class_id"];

        // validation
        if (empty($name) or empty($id) or preg_match("/[a-z]/i",$id)) {
            if(empty($name))
                echo '<p class="error">Please enter class</p>';
            if(empty($id))
                echo '<p class="error">Please enter class id</p>';
            if(preg_match("/[a-z]/i",$id))
                echo '<p class="error">Please enter valid class id</p>';
            exit();
        }

        $sql = "INSERT INTO `class` (`name`, `id`) VALUES ('$name', '$id')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid class name or class id")';
            echo '</script>';
        } else{
            echo '<script language="javascript">';
            echo 'alert("Successful)';
            echo '</script>';
        }
    }

?>
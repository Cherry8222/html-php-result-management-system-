
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/manageresult.css">
    
    <title>Document</title>

</head>
<body>
   
       <div class="dash">

        <h2 class="dashboardtitle">ADMIN DASHBOARD</h2>

        
        <div class="log">
            <!-- <button type="submit" class="button-17 topbtn newbtn"> <a class="nn" href="logout.php">LOGOUT</a> </button> -->
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
    <div class="main">
        <br><br>
        <form action="" method="post">
            <fieldset>
                <legend>Delete Result</legend>
                <?php
                    include('init.php');
                    include('session.php');
                    
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class_name">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <input type="text" name="rno" placeholder="Roll No">
                <input type="submit" value="Delete">
            </fieldset>
        </form>
        <br><br>

        <form action="" method="post">
            <fieldset>
                <legend>Update Result</legend>
                
                <?php
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                
                <input type="text" name="rn" placeholder="Roll No">
                <input type="text" name="p1" id="" placeholder="Paper 1">
                <input type="text" name="p2" id="" placeholder="Paper 2">
                <input type="text" name="p3" id="" placeholder="Paper 3">
                <input type="text" name="p4" id="" placeholder="Paper 4">
                <input type="text" name="p5" id="" placeholder="Paper 5">
                <input type="submit" value="Update">
            </fieldset>
        </form>
    </div>
</body>
</html>

<?php
    if(isset($_POST['class_name'],$_POST['rno'])) {
        $class_name=$_POST['class_name'];
        $rno=$_POST['rno'];
        echo $class_name;
        echo $rno;
        $delete_sql=mysqli_query($conn,"DELETE from `result` where `rno`='$rno' and `class`='$class_name'");
        if(!$delete_sql){
            echo '<script language="javascript">';
            echo 'alert("Not available")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Deleted")';
            echo '</script>';
        }
    }

    if(isset($_POST['rn'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5'],$_POST['class'])) {
        $rno=$_POST['rn'];
        $class_name=$_POST['class'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];

        $marks=$p1+$p2+$p3+$p4+$p5;
        $percentage=$marks/5;
        

        $sql="UPDATE `result` SET `p1`='$p1',`p2`='$p2',`p3`='$p3',`p4`='$p4',`p5`='$p5',`marks`='$marks',`percentage`='$percentage' WHERE `rno`='$rno' and `class`='$class_name'";
        $update_sql=mysqli_query($conn,$sql);

        if(!$update_sql){
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Updated")';
            echo '</script>';
        }
    }
?>
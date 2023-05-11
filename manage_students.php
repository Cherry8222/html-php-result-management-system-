<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/manageclass.css">
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
    <div class="chain">
        <?php
            include('init.php');
            include('session.php');

            $sql = "SELECT `name`, `rno`, `class_name` FROM `students`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               echo "<table>
                
                <tr>
                <th>NAME</th>
                <th>ROLL NO</th>
                <th>CLASS</th>
                </tr>";

                while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['rno'] . "</td>";
                    echo "<td>" . $row['class_name'] . "</td>";
                    echo "</tr>";
                  }

                echo "</table>";
            } else {
                echo "0 Students";
            }
        ?>
    </div>


</body>
</html>
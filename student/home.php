<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Student project</title>
    
</head>
<body>
    <?php
        $host='localhost';
        $user='root';
        $pass='';
        $db='student';

        $conn=mysqli_connect($host,$user,$pass,$db);
        $res=mysqli_query($conn,'select * from student');

        $id='';
        $name='';
        $address='';

        if(isset($_POST['id']))
        {
            $id=$_POST['id'];
        }
        if(isset($_POST['name']))
        {
            $name=$_POST['name'];
        }
        if(isset($_POST['address']))
        {
            $address=$_POST['address'];
        }

        $sqls ='';
        if(isset($_POST['add']))
        {
            $sqls = "insert into student value ($id,'$name','$address')";
            mysqli_query($conn,$sqls);
            header ("location: home.php");
        }
        if(isset($_POST['del']))
        {
            $sqls = "delete from student where id = '$id'";
            mysqli_query($conn,$sqls);
            header ("location: home.php");
        }
    ?>
    <div id="mother">
        <form action="" method="post">
            <aside>
                <div id="div">
                    <img src="https://mpng.subpng.com/20180712/qvg/kisspng-student-university-and-college-admission-institute-medical-students-5b47ed72b04f14.8766271215314404987222.jpg" alt="Logo" width=100%>
                    <h3>Manager Panel</h3>
                    <label for="">Student NO:</label><br>
                    <input type="text" name="id" id="id"><br>
                    <label for="">Student Name:</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label for="">Student Address:</label><br>
                    <input type="text" name="address" id="address"><br>
                    <button name="add">Add Student</button>
                    <button name="del">Delete Student</button>
                </div>
            </aside>
            <main>
                <table id="tbl">
                    <tr>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <th>Student Address</th>
                    </tr>
                    <?php
                    while ($row=mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </main>
        </form>
    </div>
</body>
</html>
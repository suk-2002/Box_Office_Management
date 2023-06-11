<?php
require_once('config.php');
?>
<!DOCTYPE= html>
<html>
<head>
    <title>Ticket registration</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
    table{
        border-collapse: collapse;
        width : 100%;
        color : #eb4034;
        font-family : monospace;
        font-size: 25px;
        text allign: left;
    }

    th{
        background-color: #eb4034;
        color:white;
    }
    tr:nth-child(even){background-color : #ededed}
    </style>
</head>
<body>
    <div>
        <table>
            <tr>
                <th>Movie ID</th>
                <th>Movie Name</th>

            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "BO");
            $sql="select mid,mname from movie;";
            $result = $con->query($sql);
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc())
                {
                    echo "<tr><td>" . $row["mid"] . "</td><td>" . $row["mname"] . "</td>";

                }
            }
            else{
                echo 'no result';
            }
            ?>
            </table>
        </div>



<div>
    <?php
    if(isset($_POST['submit']))
    {
        
        $sgname = $_POST['dates'];
        $gid = $_POST['mid'];
        $a = $_POST['amount'];
        $b = $_POST['tid'];
        $sql="INSERT INTO ticket_details(dates,mid,amount,tid) values(?,?,?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$sgname, $gid,$a,$b]);
        if($result){
            echo "Saved Sucessfully";                           
        }
        else
            echo 'error';
        
    }  
    ?>
<div>
    <form action="ticket_insert.php"method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                    <h1>Ticket Booking</h1>
                    <p>Fill up the form with correct values</p>
                    <label for="dates"><b>Date</b></label>
                    <input class="form-control" type="date" name="dates" required>
                    <label for="mid"><b>Movie ID</b></label>
                    <input class="form-control" type="integer" name="mid" required>
                    <label for="amount"><b>Price</b></label>
                    <input class="form-control" type="integer" name="amount" required>
                    <label for="tid"><b>Theater ID</b></label>
                    <input class="form-control" type="integer" name="tid" required>
                    <hr class="mb-3">
                    
                    <input class="btn btn-primary" type="submit" name="submit" value="Register">
                </div>
                </div>
            </div>  
    </form>
</div >    

</div>
</body>
</html>

<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Movie registration</title>
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

    <?php
    if(isset($_POST['submit']))
    {
        $sgid = $_POST['lang'];
        $sname = $_POST['mname'];
        $duration = $_POST['budget'];
        $dor = $_POST['type'];
        $sql="INSERT INTO movie(lang,mname,budget,type) values(?,?,?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$sgid, $sname,$duration,$dor]);
        if($result){
            echo "Saved Sucessfully";                           
        }
        else
            echo 'error';
        
    }  
    ?>
<div>
    <form action="movie_insert.php"method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                    <h1>Movie Registation</h1>
                    <p>Fill up the form with correct values</p>
                    <label for="lang"><b>Language</b></label>
                    <input class="form-control" type="text" name="lang" required>
                    <label for="mname"><b>Movie Name</b></label>
                    <input class="form-control" type="text" name="mname" required>
                    <label for="budget"><b>Budget</b></label>
                    <input class="form-control" type="integer" name="budget" required> 
                    <label for="type"><b>Type</b></label>
                    <input class="form-control" type="text" name="type" required>
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
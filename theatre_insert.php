<?php
require_once('config.php');
?>
<!DOCTYPE= html>
<html>
<head>
    <title>Theatre registration</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div>
    <?php
    if(isset($_POST['submit']))
    {
        
        $gname = $_POST['tid'];
        $coo = $_POST['movie_run'];
        $sql="INSERT INTO theatre(tid,movie_run) values(?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$gname, $coo]);
        if($result){
            echo "Saved Sucessfully";                           
        }
        else
            echo 'error';
        
    }  
    ?>
<div>
    <form action="theatre_insert.php"method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                    <h1>Registation</h1>
                    <p>Fill up the form with correct values</p>
                    <label for="tid"><b>Theatre ID</b></label>
                    <input class="form-control" type="integer" name="tid" required>
                    <label for="movie_run"><b>Current Movie Running</b></label>
                    <input class="form-control" type="integer" name="movie_run" required>
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
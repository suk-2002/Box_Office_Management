<?php
$servername="localhost";
$username="root";
$password="";
$dbname="BO";
$link = mysqli_connect($servername,$username,$password,$dbname);
$con  = mysqli_select_db($link,$dbname);
?>
<html>
   <body>
   <h1 style="text-align: center" >
      <strong>BOX OFFICE QUERY</strong>
<style>

</style>
<div>
<form name="form1" action="" method="post">
   <input type="submit" name="submit1" value="employee">
</form>
</div>


<H1>    QUERIES </H1>


<div> <strong>1. Find the total tickets sold for the year 2016.</strong>
<form name="query1" action="" method="post">
   <input type="submit" name="query1" value="query1">
</form>
</div>


<div> <strong>2. Display the total amount for the tickets purchased for the month of January 2013.</strong>
<form name="query2" action="" method="post">
   <input type="submit" name="query2" value="query2">
</form>
</div>


<div> <strong>3. Find the number of tickets and amount for the movie ABC after 10/11/13 to till date.</strong>
<form name="query3" action="" method="post">
   <input type="submit" name="query3" value="query3">
</form>
</div>



<div> <strong> 4. List the name and type of each movie with the word Golden in it</strong>
<form name="query4" action="" method="post">
<input type="submit" name="query4" value="query4">
</form>
</div>


<div> <strong>5. List the movie name, type and budget of each movie with a budget over 25 million and under 150 million, sort by budget descending.</strong>
<form name="query5" action="" method="post">
   <input type="submit" name="query5" value=" query5">
</form>
</div>





</body>
</html>


<?php

      if(isset($_POST["submit1"]))
      {
         header('Location:db.php');
      }

      

   
      if(isset($_POST["query1"]))
      {
         $res=mysqli_query($link,"Select count(*) from ticket_details where dates like'2016%';");
         echo"<table border=1>";
         echo"<tr>";
         echo"<th>";  echo"COUNT"; echo"</th>";
         
        
         
         echo"<th>";  
         echo"</tr>";
     
         while($row=mysqli_fetch_array($res))
         {
             echo"<tr>";
             echo"<th>";  echo $row["count(*)"]; echo"</th>";
            echo"</tr>";
         }
      }
      if(isset($_POST["query2"]))
      {
    $res = mysqli_query($link, "Select sum(amount) from ticket_details where dates like'2013-01%';");
         echo"<table border=1>";
         echo"<tr>";
         echo"<th>";  echo"TOTAL"; echo"</th>";
        
        
        
         
         echo"<th>";  
         echo"</tr>";
     
         while($row=mysqli_fetch_array($res))
         {
             echo"<tr>";
         
             echo"<th>";  echo $row["sum(amount)"]; echo"</th>";
          echo"</tr>";
         }
      }

      if(isset($_POST["query3"]))
      {
         $res=mysqli_query($link,"Select count(*),sum(amount) from ticket_details t,movie m where t.mid=m.mid and mname='xyz' and dates between '2013-11-11' and '2022-12-26'; ");
         echo"<table border=1>";
         echo"<tr>";
         echo"<th>";  echo"Count"; echo"</th>";
         echo"<th>";  echo"total"; echo"</th>";
   
        
         
    
         while($row=mysqli_fetch_array($res))
         {
             echo"<tr>";
         
         echo"<th>";  echo $row["count(*)"]; echo"</th>";
         echo"<th>";  echo $row["sum(amount)"]; echo"</th>";
        
         
         echo"</tr>";
         }
      }
      if(isset($_POST["query4"]))
      {
         $res=mysqli_query($link,"Select mname,type from movie where mname like 'Golden%';");
         echo"<table border=1>";
         echo"<tr>";
         echo"<th>";  echo"Movie"; echo"</th>";
         echo"<th>";  echo"type"; echo"</th>";
        
         
        
         
         echo"<th>";  
         echo"</tr>";
     
         while($row=mysqli_fetch_array($res))
         {
             echo"<tr>";
         echo"<th>";  echo $row["mname"]; echo"</th>";
         echo"<th>";  echo $row["type"]; echo"</th>";
        
         
         
         echo"</tr>";
         }
      }
      if(isset($_POST["query5"]))
      {
         $res=mysqli_query($link,"Select mname,type,budget from movie where budget between 25000000 and 150000000 order by budget desc");
         echo"<table border=1>";
         echo"<tr>";
         echo"<th>";  echo"movie"; echo"</th>";
         echo"<th>";  echo"type"; echo"</th>";
         echo"<th>";  echo"budget"; echo"</th>";
        
         
         echo"<th>";  
         echo"</tr>";
     
         while($row=mysqli_fetch_array($res))
         {
             echo"<tr>";
         echo"<th>";  echo $row["mname"]; echo"</th>";
         echo"<th>";  echo $row["type"]; echo"</th>";
         echo"<th>";  echo $row["budget"]; echo"</th>";
         echo"</tr>";
         }
      }
     
         
?>
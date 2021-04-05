<!DOCTYPE HTML>
<html>

<head>
  <link rel="stylesheet" href="css/style.css">
    <style>
    .error {
    color: #FF0000;
    font-size: 14px;  }
    body{
    background-image: url(sources/bg.jpg);
    background-repeat: no-repeat;
    background-size: 1600px 790px;
      }

    </style>
</head>

<body>
 <div><?php include 'controller/Head.php';?></div>

<?php 
session_start();

if (empty($_SESSION['username'])) {
    header("location:userlogin.php");
    
}

else{
    echo "<div style='float: right';>"."Logged in as ".$_SESSION['username']." | ";
    echo "<a href='Dashboard.php'>Dashboard</a> | " ;
    echo "<a href='UserLogin.php'>Logout</a>" ;
    echo "</div><br><br><hr><br>";
   
}

 ?>



    
    <div class="box">
    <form  method="post" action="controller/create.php" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      
      <h1><a>RECIPTIONIST</a></h1><hr><br>
            
            <label for="name"><a>Name:</a></label> <input type="text" name="name" placeholder="Enter Your Name">
           </label>
          
            <br>
            
            <label for="address"><a>Address:</a></label> <input type="text" name="address" placeholder="Enter your Address">
            
            <br>
            
            <label for="phonenum"><a>Phone NO:</a></label> <input type="number" name="phonenum" placeholder="Enter Your Phone number">
            
            <br><br>
            
                        <fieldset style="border-color: black;">
                <legend><label for="dob"><a>Date Of Birth</a></label></legend>
                <input type="date" name="dob">
                
                
                <br>
            </fieldset>
            <br>
            <label for="pass"><a>Password:</a></label> <input type="Password" name="pass" placeholder="Enter Your Password">
            
            <br>
            <fieldset style="border-color: black;">
                <legend><label for="gender"><a>Gender</a></label></legend>
                <input type="radio" name="gender" value="female"><a>Female</a>
                <input type="radio" name="gender" value="male"><a>Male</a>
                <input type="radio" name="gender" value="other"><a>Other</a>
                
                </fieldset>
         

            <br>
            <hr>
            
            
  <input type="submit" name = "create" value="Save">
  <input type="reset" name="reset" value="Reset">
       
    </form>
    </div>
</div>
</body>

</html>
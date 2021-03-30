<!DOCTYPE HTML>
<html>

<head>
    <style>
    .error {
        color: #FF0000;
    }
    h2{
       text-align: center; }
  form{ padding-top: 20px;
        text-align: center;
        font-size: 20px;}
  input{
       padding: 5px 12px;
       border: 1px solid #ddd;
       border-radius: 2px;
       background-color: #fff;
       box-shadow: inset 1px 1px 5px rgba(0,0,0,0.2);
  }
  input[type="submit"] {
    padding: 5px 15px;
    background-color: green;
    border: 8px;
    color: #fff;
    border-radius: 8px;
}  
  input[type="reset"] {
    padding: 5px 15px;
    background-color: gray;
    border: 8px;
    color: #fff;
    border-radius: 8px;

}

  span{ font-size: 15px;
        text-align: center;  
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
    echo "<div style='float: right';>"." Logged in as ".$_SESSION['username']." | ";
    echo "<a href='Dashboard.php'>Dashboard</a> | " ;
    echo "<a href='UserLogin.php'>Logout</a>" ;
    echo "</div><br><br><hr><br>";
   
}

 ?>



    <hr>
    <form  method="post" action="controller/create.php" style="border: 5px;margin-top: 10px;margin-bottom: 0px; margin-left: 300px;margin-right: 300px;border-style: solid;border-color: black;padding: 1em;" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      
      <h1><span style="font-weight: bold;font-size: 25px;">RECIPTIONIST</span></h1>  <hr>
            
            <label for="name">Name:</label> <input type="text" name="name" placeholder="Enter Your Name">
           </label>
          
            <br>
            <br>
            <label for="address">Address:</label> <input type="text" name="address" placeholder="Enter your Address">
            
            <br>
            <br>
            <label for="phonenum">Phone NO:</label> <input type="number" name="phonenum" placeholder="Enter Your Phone number">
            
            <br>
            <br>
                        <fieldset style="border-color: black;">
                <legend><label for="dob">Date Of Birth</label></legend>
                <input type="date" name="dob">
                
                
                <br>
            </fieldset>
            <br>
            <label for="pass">Password:</label> <input type="Password" name="pass" placeholder="Enter Your Password">
            
            <br>
            <br>
            <fieldset style="border-color: black;">
                <legend><label for="gender">Gender</label></legend>
                Gender:
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="other">Other
                
                </fieldset>
         

            <br>
            <hr>
            <br>
            
  <input type="submit" name = "create" value="Save">
  <input type="reset" name="reset" value="Reset">
       
    </form>
    <div><?php include 'controller/footer.php';?></div>
</div>
</body>

</html>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>

  <!-- Custom Theme files -->
  <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
  <!-- //Custom Theme files -->

  <!-- web font -->
  <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
  <!-- //web font -->

</head>
<body>

  <!-- main -->

    <div class="bg-layer">
      <h1 style="color: white;text-shadow: 1px 1px 8px black;">WELCOME ! to Process Management System</h1>

              <div class="header-main">
        <div><a class="navbar-brand mr-1" href="#"><img src="../images/logo3.png" style="width: 60px; height: 40px; align-self: center;"> <h4 style="color: white;text-shadow: 1px 1px 8px black;">TOOL TECH</h4>
</a>
            </div>

        <div class="header-left-bottom">
          <form action="#" method="post">   
            <h1 style="color: white;text-shadow: 1px 1px 8px black;">Admin login here</h1>
            <div class="icon1">
              <span class="fa fa-user"></span>
              <input type="email" placeholder="Email Address" name="email"  required=""/>
            </div>
            <div class="icon1">
              <span class="fa fa-lock"></span>
              <input type="password" placeholder="Password" name="password" required=""/>
            </div>
            <div class="bottom">
              <button class="btn" type="submit" name="submit">Log In</button>
            </div>
            <div class="links">
              <p class="right"><a href="../index.php">Users..? Login Here</a></p>
              <div class="clear"></div>
            </div>
          </form> 
        </div>
      </div>

    </div>
   
  <!-- //main -->

  <?php
  error_reporting(-1);
ini_set('display_errors', 'On');
  session_start();
  require '../Classes/init.php';
  $func = new Operation();

  
  if(isset($_POST['submit']))
  {     
    $invalidErr="";
    $email = $_POST["email"]; 
    $password = $_POST["password"];  
    $status=1;        

    //$sql = "SELECT * FROM admin WHERE admin_email = '".$email."' AND  admin_password = '".$password."' AND  admin_status = '1'";

    $result = $func->select_with_multiple_conditions(array('*'),'admin',"admin_email = '".$email."'",'AND',"admin_password = '".$password."'","admin_status = '".$status."'");

    while($row = $result->fetch_assoc())
    {
     $myId=$row["admin_id"];
     }             
   session_regenerate_id();
   $_SESSION['admin_id']=$myId;             
   session_write_close();

   if ($result->num_rows > 0 )
   {                  
     header("location: AdminHome.php");
   }   
   else
   {
    $message="Invalid username Or Password..!!";
    echo "<script type='text/javascript'>alert('$message');</script>";
   }                 
  }
?>
</body>s
</html>
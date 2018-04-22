<?php
  require_once("../php/db_conn.php");

  $connection = connect_to_db();

  if (isset($_POST["login-submit"])){
    $query = sprintf("SELECT * FROM `login_register_info` WHERE `Username` = '%s' AND `password` = '%s'",
                $connection->real_escape_string($_POST["LoginUsername"]),
                md5($connection->real_escape_string($_POST["LoginPassword"])));

    $result=$connection->query($query) or die (mysqli_error($connection));
    
    if($result !== false && mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION['authenticated'] = true;
        $_SESSION['user'] = $connection->real_escape_string($_POST["LoginUsername"]);
                
        // get all the data from the database in a an array
        $resultArray = mysqli_fetch_assoc($result);
        
        $_SESSION['user_email'] = $resultArray['Email Address'];
        
        
        
        if(($_SESSION['user'] == 'taznova25') ||($_SESSION['user'] == 'taz')) {
            header("Location: ownerBackEnd.php");
        }
        else {
            // get the transaction id for this session
            $tran_id = getTranId($connection, $_SESSION['user'], $_SESSION['user_email']);
            $_SESSION['tran_id'] = $tran_id;
            header("Location: Homepage.php");
        }
    }
  }
  

  if(isset($_POST["register-submit"])){

    
    $query = sprintf("INSERT INTO `login_register_info` (`Username` ,`Email Address`, `password`) 
                VALUES ('%s', '%s', '%s')",
                $connection->real_escape_string($_POST["RegisterUsername"]),
                $connection->real_escape_string($_POST["RegisterEmail"]),
                // encrypt password
                md5($connection->real_escape_string($_POST["RegisterPassword"])));

    $result=$connection->query($query) or die (mysqli_error($connection));
  }
  
  // this function get a tran_id from the transation_table in the database
  // The way it works is that, I have a tran_id that is set to auto increment
  // every time a date is inserted into the table. This date corresponds
  // to the users session login, which is considered a tranaction session for the user.
  // Therefore corresponding to every session that a user logs in, there is a transaction
  // date and a transaction id. 
  
  // The way this method works is that, it takes in the user name and the email address of the user
  // and then inserts those values and the current datetime to the transaction_table. Since tran_id is
  // an autoincrement field, it will automatically get incremented to the next transaction number.
  // This transaction number which is actually the tran_id will be grabbled using a max aggregate function
  function getTranId($db_connection,$user_name, $user_email){
      //first insert into the database
      $sql = sprintf("Insert into `transaction_table` (`user_name`,`user_email`,`tran_date`) 
                        Values('%s','%s',NOW())",
                       $db_connection->real_escape_string($user_name),
                       $db_connection->real_escape_string($user_email));
      // execute thin sql
      $result=$db_connection->query($sql) or die (mysqli_error($db_connection));
      
      // Now get the max tran_id that will be the transaction id for this session of the user
      $sql = 'Select max(tran_id) as max_tran_id From transaction_table';
      // get that tran_id as integer
      $result=$db_connection->query($sql) or die (mysqli_error($db_connection));
      $row = mysqli_fetch_assoc($result);
      $max_tran_id = $row['max_tran_id'];
      
      // return this tran id
      return $max_tran_id;
  }
  
?>

<html>
  <Head>
      <link rel="stylesheet" type="text/css" href="..\css\style.css">
      <link rel="stylesheet" type="text/css" href="..\css\bootstrap-3.3.7\dist\css\bootstrap.min.css">
      <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
      <script type="text/javascript" src="..\js\script.js"></script>
     
  </Head>
  <body class="login-register">
   <!--login screen-->
   <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="" method="post" role="form" style="display: block;">
                                <p style="color:red">
                                    <?php
                                        if (isset($_POST["login-submit"]) && mysqli_num_rows($result) == 0){
                                            echo "Invalid Username and Password.";
                                        }
                                    ?>
                                </p>
                                <div class="form-group">
                                    <input type="text" name="LoginUsername" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="LoginPassword" id="password" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input class="btn-primary btn-login" type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <a href="Homepage.php" tabindex="5" class="forgot-password">Home Page</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form id="register-form" action="" method="post" role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="RegisterUsername" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="RegisterEmail" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="RegisterPassword" id="password" tabindex="2" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" class="btn-primary btn-register" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
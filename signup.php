<?php 
  include"inc-0/header.php";
?>
  <li><a href="index.php">home</a></li>
              <li><a href="about.php">about</a></li>
            </ul>
          </div>
          <div class="nav-right">
            <?php
            if (isset($_SESSION["logedin"])) {
              echo ' <div class="nav-content">
                        <a href="reset-password.php">Reset password</a>
                        <form class="nav-logout" action="inc-1/logout-process.php" method="post">
                          <button type="submit" name="logout-submit">LOGOUT</button>
                        </form>
                      </div>';
            }else{
              echo '<div class="nav-content">
                <a class="dark" href="signup.php">SIGN UP</a>
              </div>';
            }
             ?>
          </div>
        </div>
    </nav>
  </header>
  <main>
    <div class="main-wrapper">
      <h1>signup</h1>
        <?php
          if (isset($_SESSION['logedin'])) {
          header("Location: dashboard.php");
          }
        ?>
      <div class="main-wrapper-content">
        <form class="form-group-content" action="inc-1/signup-process.php" method="post">
        <?php 
          if (isset($_SESSION["error"]) && !empty($_SESSION["error"])) {
            echo '<span style="color:red;">'.$_SESSION["error"].'</span>';
            session_unset();
          }    
          if(isset($_GET['first_name'])){
            $first_name = $_GET['first_name'];
            echo '
              <input class="form-control" type="text" name="first_name" value="'.$first_name.'" placeholder="Enter first_name">';
          } else{
            echo '
            <input class="form-control" type="text" name="first_name" value="" placeholder="Enter first_name">';
          }
          if(isset($_GET['last_name'])){
            $last_name = $_GET['last_name'];
            echo '
              <input class="form-control" type="text" name="last_name" value="'.$last_name.'" placeholder="Enter last_name">';
          } else{
            echo '
            <input class="form-control" type="text" name="last_name" value="" placeholder="Enter last_name">';
          }
          if(isset($_GET['mail'])){
            $mail = $_GET['mail'];
            echo '
              <input class="form-control" type="text" name="email" value="'.$mail.'" placeholder="Enter E-mail">';
          } else{
            echo '
            <input class="form-control" type="text" name="email" value="" placeholder="Enter E-mail">';
          }
    ?> 
          <select class="form-control" name="gender" id="">
            <option value="Gender">Gender</option>
            <option value="Male"
            <?php              
                if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                    echo "selected";                                                           
                }                
              ?>>Male</option>
            <option value="Female" 
            <?php              
                if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                    echo "selected";                                                           
                }                
              ?>>Female</option>
          </select>
          <select class="form-control" name="designation" id="">
            <option value="select Designation">select Designation</option>
            <option value="Medical Team (MT)"
              <?php              
                if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team (MT)'){
                    echo "selected";                                                           
                }                
              ?>>Medical Team (MT)</option>
            <option value="Patients"
              <?php              
                if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patients'){
                    echo "selected";                                                           
                }                
              ?>>Patients</option>
          </select>
            <?php              
               if(isset($_GET['department'])){
                $department = $_GET['department'];
                echo '
                  <input class="form-control" type="text" name="department" value="'.$department.'" placeholder="Enter department">';
              } else{
                echo '
                <input class="form-control" type="text" name="department" value="" placeholder="Enter department">';
              }               
            ?> 
          <input class="form-control" type="password" name="pwd" placeholder="Password">
          <input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat-password">
          <button class="btn" type="submit" name="signup-submit">SIGNUP</button>
        </form>
        <p>Already have an account? <a href="login.php"> LOGIN</a></p>
      </div>
    </div>
  </main>

<?php include "inc-0/footer.php"; ?>

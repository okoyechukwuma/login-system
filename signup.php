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
  ?>
          <input class="form-control"
            <?php              
              if(isset($_SESSION['first_name'])){
                  echo "value=" . $_SESSION['first_name'];                                                             
              }                
            ?> type="text" name="first_name" placeholder="Enter first_name" autocomplete="off" value="">
          <input class="form-control"
            <?php              
              if(isset($_SESSION['last_name'])){
                  echo "value=" . $_SESSION['last_name'];                                                             
              }                
            ?>  type="text" name="last_name" placeholder="Enter last_name" autocomplete="off" value="">
          <input class="form-control"
            <?php              
              if(isset($_SESSION['email'])){
                  echo "value=" . $_SESSION['email'];                                                             
              }                
            ?>  type="text" name="email" placeholder="E-mail" autocomplete="off" value="">
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
          <input class="form-control"
            <?php              
              if(isset($_SESSION['department'])){
                  echo "value=" . $_SESSION['department'];                                                             
              }                
            ?>  type="text" name="department" placeholder="department" autocomplete="off" value="">
          <input class="form-control" type="password" name="pwd" placeholder="Password">
          <input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat-password">
          <button class="btn" type="submit" name="signup-submit">SIGNUP</button>
        </form>
        <p>Already have an account? <a href="login.php"> LOGIN</a></p>
      </div>
    </div>
  </main>

<?php include "inc-0/footer.php"; ?>

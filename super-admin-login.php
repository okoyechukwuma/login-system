<?php 
    include"inc-0/header.php";
?>

            <li><a href="index.php">home</a></li>
            <li><a href="about.php">about</a></li>
          </ul>
          </div>
          <div class="nav-right">
            
              <a class="dark" href="login.php">LOGIN</a>   
            
          </div>
        </div>
      </nav>
    </header>

    <main>
      <div class="main-wrapper">
        <h1>LOGIN</h1>
        <h3>with you registered E-mail and password.</h3>
    <div class="main-wrapper-content">
         <form class="form-group-content" action="inc-1/admin=login-process.php" method="post">
          <?php 
             if (isset($_SESSION["error"])) {
                echo '<span style="color:red;">'.$_SESSION["error"].'</span>';
                session_unset();
             }
             if (isset($_SESSION["message"])) {
                echo '<span style="color:green;">'.$_SESSION["message"].'</span>';
                session_unset();
             } 

            ?> 
            <input
             <?php              
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];                                                             
                    }                
                ?> class="form-control" type="text" name="email" placeholder="E-mail" value="">
            <input class="form-control" type="password" name="pwd" placeholder="Password">
            <button class="btn" type="submit" name="login-submit">LOGIN</button>
         </form>
         </div>
      </div>
    </main>

<?php
    include"inc-0/footer.php";
?>
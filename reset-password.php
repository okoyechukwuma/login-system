<?php 
    include"inc-0/header.php";
?>

            <li class="dark"><a href="index.php">home</a></li>
            <li><a href="about.php">about</a></li>
        <?php include"inc-0/main.php";?>

    <main>
      <div class="main-wrapper">
      <?php
        if(!isset($_SESSION['logedin']) && !isset($_SESSION['token']) && !isset($_GET['token'])){
                 $_SESSION['error'] = "You are not authorized to view that page";
                header("Location: login.php");
            }
        ?>
        <h1>Reset Password</h1>
        <h3>Enter your E-mail and new password.</h3>
    <div class="main-wrapper-content">
         <form class="form-group-content" action="inc-1/reset-process.php" method="post">
          <?php 
             if (isset($_SESSION["error"]) && !empty($_SESSION["error"])) {
                echo '<span style="color:red;">'.$_SESSION["error"].'</span>';
                session_unset();
             }    
        ?> 
         <div>
         <?php if(!$_SESSION['logedin']) { ?>

        <input
            
            <?php              
                if(isset($_SESSION['token'])){
                    echo "value='" . $_SESSION['token'] . "'";                                                             
                }else{
                    echo "value='" . $_GET['token'] . "'";
                }             
            ?>

           type="hidden" name="token"  />
    <?php } ?>
    </div>
            <input class="form-control"
             <?php
                if (isset($_SESSION['email'])) {
                    echo "value=" . $_SESSION['email'];
                }
            ?> type="text" name="email" placeholder="E-mail" autocomplete="off" value="">
            <input class="form-control" type="password" name="pwd" placeholder="Password">
            <button class="btn" type="submit" name="signup-submit">SEND</button>
         </form>
         </div>
      </div>
    </main>

<?php
    include"inc-0/footer.php";
?>
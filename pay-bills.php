<?php
    include"inc-0/header.php";

    if (!isset($_SESSION['logedin'])) {
        header("Location: index.php");
    }
?>
            <li class="dark"><a href="index.php">home</a></li>
            <li><a href="about.php">about</a></li>
            <?php include"inc-0/main.php";?>

    <main>
      <div class="main-wrapper">
        <h1>Pay Bills</h1>
        <div class="main-wrapper-content">
            <form class="form-group-content" action="inc-1/pay-bill-process.php" method="post">
            <?php 
                if (isset($_GET["error"])) {
                   if ($_GET["error"] == "failed") {
                       echo '<span style="color:red;">There is an issue with your payment, try again later.</span>';
                   }
                }
                ?> 
                <input
                    <?php
                        if (isset($_SESSION['firstname']) && isset($_SESSION['lastname'])) {
                            echo "value=" . $_SESSION['fullname'].' '.$_SESSION['lastname'];
                        } 
                        ?> class="form-control" type="text" name="fullname">
                        <?php
                            if (isset($_GET['error'])) {
                               if ($_GET['error'] == 'nameempty') {
                                echo '<span style="color:red;">Name can not be empty.</span>';
                               }elseif ($_GET['error'] == 'nameless') {
                                echo '<span style="color:red;">Name can not be two or less than two(2).</span>';
                               }else if ($_GET['error'] == 'nameerro') {
                                echo '<span style="color:red;">Only letters needed.</span>';
                                }
                            }
                        ?>
                <input
                <?php              
                        if(isset($_SESSION['email'])){
                            echo "value=" . $_SESSION['email'];                                                             
                        }                
                    ?> class="form-control" type="text" name="email" placeholder="E-mail" value="">
                     <?php
                            if (isset($_GET['error'])) {
                               if ($_GET['error'] == 'mailempty') {
                                echo '<span style="color:red;">Mail can not be empty.</span>';
                               }elseif ($_GET['error'] == 'mailless') {
                                echo '<span style="color:red;">Mail can not be five or less than five(5).</span>';
                               }else if ($_GET['error'] == 'invalidmail') {
                                echo '<span style="color:red;">invalid mail address.</span>';
                                }else if ($_GET['error'] == 'mailntsame') {
                                    echo '<span style="color:red;">invalid user.</span>';
                                    }
                            }
                        ?>
                <input class="form-control" type="text" name="amt" placeholder="Enter amount &#8358;">
                <?php
                            if (isset($_GET['error'])) {
                               if ($_GET['error'] == 'amtempty') {
                                echo '<span style="color:red;">Amount can not be empty.</span>';
                               }elseif ($_GET['error'] == 'amtless') {
                                echo '<span style="color:red;">Amount can not be one or less than one(1).</span>';
                               }else if ($_GET['error'] == 'invalidamt') {
                                echo '<span style="color:red;">Only numbers needed.</span>';
                                }
                            }
                        ?>
                <input class="form-control" type="text" name="bill-for" placeholder="reason for payment....">
                <?php
                            if (isset($_GET['error'])) {
                               if ($_GET['error'] == 'billempty') {
                                echo '<span style="color:red;">This field can not be empty.</span>';
                               }elseif ($_GET['error'] == 'billless') {
                                echo '<span style="color:red;">Amount can not be three or less than three(3).</span>';
                               }else if ($_GET['error'] == 'invalidbill') {
                                echo '<span style="color:red;">Only letters needed.</span>';
                                }
                            }
                        ?>
                <button class="btn" type="submit" name="pay-bill-submit">PAY BILL</button>
            </form>
         </div>
      </div>
    </main>


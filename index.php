<?php require "inc-0/header.php"; ?>

<li class="dark"><a href="index.php">home</a></li>
              <li><a href="about.php">about</a></li>
<?php include"inc-0/main.php";?>
    <main>  
      <div class="main-wrapper">
        <?php
          if (isset($_SESSION["logedin"]) && $_SESSION['designation'] == 'Patients') {
            echo "<p>you are logged in as a patient!</p>";
            echo ' <button onclick="document.location=\'pay-bills.php\'" class="pay-btn" type="submit" name="pay-btn">Pay Bills</button>
            <button onclick="document.location=\'appointment.php\'" class="book-btn" type="submit" name="book-btn">Book Appointment</button><button onclick="document.location=\'transaction.php\'" class="book-btn" type="submit" name="book-btn">View Transactions</button>';
          }else if (isset($_SESSION['admin@gmail.com']) &&  isset($_SESSION['pass'])) {
            echo "<p>you are logged in as an Admin!</p>";
           }else if(isset($_SESSION["logedin"])){
            echo "<p>you are logged in as a medical staff!</p>";
            echo '<button onclick="document.location=\'medical.php\'" class="book-btn" type="submit" name="book-btn">View Appointment</button>';
           } else{
            echo "<p>you are logged out! login using your user name or e-mail.</p>
            <a href=\"super-admin-login.php\">Login As Admin.</a>";
          }
         ?>
      </div>
    </main>

  <?php require "inc-0/footer.php"; ?>

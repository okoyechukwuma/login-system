<?php 
  include"inc-0/header.php";
  if (!isset($_SESSION['admin@gmail.com'])) {
    header("Location: index.php");
  }
  ?>
          <li><a href="index.php">home</a></li>
          <li class="dark"><a href="#">Admin page</a></li>
        </ul>
      </div>
      <div class="nav-right">
        <div class="nav-content">
            <form class="nav-logout" action="inc-1/logout-process.php" method="post">
                <button type="submit" name="logout-submit">LOGOUT</button>
            </form>
        </div>
      </div>
    </div>
    </nav>
    </header>
    <main>
      <div class="main-wrapper">
        <h3>Super Admin Page</h3>
        <a href="signup.php">Add User</a>
        <div class="time">
          <h3>Logedd in Time: </h3> <?php echo  $_SESSION["Time"]?>.
        </div>
        <div class="date">
          <h3>Logged in date: </h3><?php echo  $_SESSION["Date"]?>.
        </div>
        <div class="admin-button">
          <button class="admin-btn" type="button"><a href="allPatient.php">View All Patients</a></button>
          <button class="admin-btn" type="button"><a href="allMedical.php">View All Medical Team(MT)</a></button>
          <button class="admin-btn" type="button"><a href="allTransactions.php">View All Transactions</a></button>
        </div>
      </div>
    </main>
       
<?php 
  include"inc-0/footer.php";
 ?>
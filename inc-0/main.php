             </ul>
          </div>
          <div class="nav-right">
            <?php
            if (isset($_SESSION["logedin"]) || isset($_SESSION["admin@gmail.com"])) {
              echo ' <div class="nav-content">
                        <a href="reset-password.php">Reset password</a>
                        <form class="nav-logout" action="inc-1/logout-process.php" method="post">
                          <button type="submit" name="logout-submit">LOGOUT</button>
                        </form>
                      </div>';
            }else{
              echo '<div class="nav-content">
                <a href="login.php">LOGIN</a>
                <a href="signup.php">SIGNUP</a>
              </div>';
            }
             ?>
          </div>
        </div>
    </nav>
  </header>
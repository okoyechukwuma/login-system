<?php 
  include"inc-0/header.php";
?>

                <li><a href="index.php">home</a></li>
              <li><a href="about.php">about</a></li>
            </ul>
          </div>
          <div class="nav-right">
            <div class="nav-content">
                <form class="nav-logout" action="super-admin.php" method="post">
                    <button type="submit" name="logout-submit">Back</button>
                </form>
            </div>
          </div>
        </div>
    </nav>
  </header>
  <main>
    <div class="main-wrapper">
        <h3>All Medical Team(MT) Page</h3>
        <?php
            $allMedical = scandir("db/users/");
            $countAllMedical = count($allMedical);
            
                for ($counter = 2; $counter  < $countAllMedical; $counter++) { 
                  $currentUser = $allMedical[$counter];
                  
                  $MedicalContent = file_get_contents("db/users/". $currentUser);
                  $MedicalObject = json_decode($MedicalContent);
                  $first_name = @$MedicalObject -> first_name;
                  $last_name = @$MedicalObject -> last_name;
                  $email = $MedicalObject -> email;
                  $gender = @$MedicalObject -> gender;
                  $designation = $MedicalObject -> designation;
                  $department = @$MedicalObject -> department;
                  // property_exists();
                  if ($designation == "Medical Team (MT)") {
                    echo  '
                    <table>
                    <tr>
                        <td>Full Name</td>
                        <td>Email</td>
                        <td>Gender</td>
                        <td>Designation</td>
                        <td>Department</td>
                    </tr>
                    <tbody>
                        <td>'.$first_name." ".$last_name.'</td>
                        <td>'.$email.'</td>
                        <td>'.$gender.'</td>
                        <td>'.$designation.'</td>
                        <td>'.$department.'</td>
                    </tbody>
                </table>';
                  }
                   
                }
        ?>
        
                    
    </div>
  </main>
<?php include "inc-0/footer.php"; ?>
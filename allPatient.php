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
        <h3>All Patients Page</h3>
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
                    $time = @$MedicalObject -> time;
                    $date = @$MedicalObject -> date;
                   
                    if ($designation == "Patients") {
                 
                  echo '<table>
                  <tr>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Designation</th>
                      <th>Department</th>
                      <th>time</th>
                      <th>date</th>
                  </tr>
                  <tbody>
                      <td>'.$first_name." ".$last_name.'</td>
                      <td>'.$email.'</td>
                      <td>'.$gender.'</td>
                      <td>'.$designation.'</td>
                      <td>'.$department.'</td>
                      <td>'.$time.'</td>
                      <td>'.$date.'</td>
                  </tbody>
              </table>';
                    }
                   
                }
        ?>
        
    </div>
  </main>
<?php include "inc-0/footer.php"; ?>
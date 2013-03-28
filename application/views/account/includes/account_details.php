<br />
                <h3 class="section_title"><strong>Personal Details</strong></h3>
                <br />
                <br />
                <table class="form-default no-border" width="100%">
                  <tbody>
                  <tr>
                    <td width="25%" class="field_label">Professor Number:</td>
                    <td width="75%"><?php echo $m->getStudentEmployeeCode(); ?></td>
                  </tr>
                  <tr>
                    <td width="25%" class="field_label">First Name:</td>
                    <td width="75%"><?php echo $m->getFirstName(); ?></td>
                  </tr>
                  <tr>
                    <td width="25%" class="field_label">Middle Name:</td>
                    <td width="75%"><?php echo $m->getMiddleName(); ?></td>
                  </tr>
                  <tr>
                    <td width="25%" class="field_label">Last Name:</td>
                    <td width="75%"><?php echo $m->getLastName(); ?></td>
                  </tr>
                  <tr>
                    <td width="25%" class="field_label">Gender:</td>
                    <td width="75%"><?php echo $m->getGender(); ?></td>
                  </tr>
                  <tr>
                    <td width="25%" class="field_label">Birthdate:</td>
                    <td width="75%"><?php echo $m->getBirthdate(); ?></td>
                  </tr>
                  <tr>
                    <td width="25%" class="field_label">Email Address:</td>
                    <td width="75%"><?php echo $m->getEmailAddress(); ?></td>
                  </tr>
                   <tr>
                    <td width="25%" class="field_label">Address:</td>
                    <td width="75%"><?php echo $m->getAddress(); ?></td>
                  </tr>
                  <tr>
                    <td width="25%" class="field_label">Phone Number:</td>
                    <td width="75%"><?php echo $m->getPhoneNumber(); ?></td>
                  </tr>
                  <tr>
                    <td width="25%" class="field_label">Mobile Number:</td>
                    <td width="75%"><?php echo $m->getMobileNumber(); ?></td>
                  </tr>
                </tbody>
                </table>
                
                <br />
                <br />
                <div class="form_separator"></div>
                <br />
                
                <?php
                $acc = CV_Login_Finder::findByMemberId($m->getId());
                ?>
                <h3 class="section_title"><strong>Account Settings</strong></h3>
                <br />
                <br />
                <table class="form-default no-border" width="100%">
                  <tbody>
                  <tr>
                    <td width="25%" class="field_label">Username:</td>
                    <td width="75%"><?php echo $acc->getUsername(); ?></td>
                  </tr>
                  <tr>
                    <td width="25%" class="field_label">Password:</td>
                    <td width="75%">*********************************</td>
                  </tr>
                </tbody>
                </table>
                <br />
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12  overflow-hidden">
                <h2 class="dashboard-title">Add New Student</h2>
                <p>Please fill this form to add a student record to the database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Student Name <span class="text-danger">*</span></label>
                        <input type="text" name="student_name"
                            class="form-control <?php echo (!empty($errors["student_name"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $student_name; ?>">
                        <div class="invalid-feedback"><?php echo $errors["student_name"]; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Student Image <span class="text-danger">*</span></label>
                        <input type="file" id="photo" name="student_image"
                            class="form-control p-0 <?php echo (!empty($errors["student_image"])) ? 'is-invalid' : ''; ?>"
                            accept="image/*" style="height: fit-content;">
                        <div class="invalid-feedback"><?php echo $errors["student_image"] ?? ''; ?></div>
                    </div>
                    <script>
                        document.getElementById('photo').addEventListener('change', function () {
                            // const file = this.files[0];
                            // if (file) {
                            //     const reader = new FileReader();
                            //     reader.onload = function (e) {
                            //         // You can display the image preview here if needed
                            //         console.log(e.target.result);
                            //     };
                            //     reader.readAsDataURL(file);
                            // }
                            if (this.files && this.files[0]) {
                                let fileName = this.files[0].name;
                                let lastDot = fileName.lastIndexOf('.');
                                let name = fileName.substring(0, lastDot);
                                let ext = fileName.substring(lastDot + 1);

                                // Remove all special characters and symbols, replace with space, and trim
                                let cleanName = name.replace(/[^a-zA-Z0-9]/g, ' ').replace(/\s+/g, ' ').trim();

                                // Capitalize first letter of each word
                                let capitalizedName = cleanName.replace(/\b\w/g, function (char) {
                                    return char.toUpperCase();
                                });

                                // If you want to capitalize only initials of student's name (assuming student's name is in cleanName)
                                // let studentInitials = cleanName.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');

                                console.log("Image Name: " + capitalizedName);
                                console.log("Extension: " + ext);
                            }
                            // console.log("File Extension: " + this.files);
                        });
                    </script>
                    <div class="form-group">
                        <label>Class <span class="text-danger">*</span></label>
                        <input type="text" name="class"
                            class="form-control <?php echo (!empty($errors["class"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $class; ?>">
                        <div class="invalid-feedback"><?php echo $errors["class"]; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Roll No <span class="text-danger">*</span></label>
                        <input type="text" name="roll_no"
                            class="form-control <?php echo (!empty($errors["roll_no"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $roll_no; ?>">
                        <div class="invalid-feedback"><?php echo $errors["roll_no"]; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Gender <span class="text-danger">*</span></label>
                        <select name="gender"
                            class="form-control <?php echo (!empty($errors["gender"])) ? 'is-invalid' : ''; ?>">
                            <option value="">Select</option>
                            <option value="Male" <?php echo ($gender == 'Male') ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo ($gender == 'Female') ? 'selected' : ''; ?>>Female</option>
                        </select>
                        <div class="invalid-feedback"><?php echo $errors["gender"]; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth <span class="text-danger">*</span></label>
                        <input type="date" name="dob"
                            class="form-control <?php echo (!empty($errors["dob"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $dob; ?>">
                        <div class="invalid-feedback"><?php echo $errors["dob"]; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Contact Number <span class="text-danger">*</span></label>
                        <input type="text" name="contact_number"
                            class="form-control <?php echo (!empty($errors["contact_number"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $contact_number; ?>">
                        <div class="invalid-feedback"><?php echo $errors["contact_number"]; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Nationality <span class="text-danger">*</span></label>
                        <input type="text" name="nationality"
                            class="form-control <?php echo (!empty($errors["nationality"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $nationality ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["nationality"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Religion <span class="text-danger">*</span></label>
                        <input type="text" name="religion"
                            class="form-control <?php echo (!empty($errors["religion"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $religion ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["religion"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Blood Group <span class="text-danger">*</span></label>
                        <input type="text" name="blood_group"
                            class="form-control <?php echo (!empty($errors["blood_group"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $blood_group ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["blood_group"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Permanent Place <span class="text-danger">*</span></label>
                        <input type="text" name="permanent_place"
                            class="form-control <?php echo (!empty($errors["permanent_place"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $permanent_place ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["permanent_place"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Permanent District <span class="text-danger">*</span></label>
                        <input type="text" name="permanent_district"
                            class="form-control <?php echo (!empty($errors["permanent_district"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $permanent_district ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["permanent_district"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Permanent Zone <span class="text-danger">*</span></label>
                        <input type="text" name="permanent_zone"
                            class="form-control <?php echo (!empty($errors["permanent_zone"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $permanent_zone ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["permanent_zone"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Temporary Place <span class="text-danger">*</span></label>
                        <input type="text" name="temporary_place"
                            class="form-control <?php echo (!empty($errors["temporary_place"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $temporary_place ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["temporary_place"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Temporary District <span class="text-danger">*</span></label>
                        <input type="text" name="temporary_district"
                            class="form-control <?php echo (!empty($errors["temporary_district"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $temporary_district ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["temporary_district"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Temporary Zone <span class="text-danger">*</span></label>
                        <input type="text" name="temporary_zone"
                            class="form-control <?php echo (!empty($errors["temporary_zone"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $temporary_zone ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["temporary_zone"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Father's Name <span class="text-danger">*</span></label>
                        <input type="text" name="father_name"
                            class="form-control <?php echo (!empty($errors["father_name"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $father_name ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["father_name"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Father's Occupation <span class="text-danger">*</span></label>
                        <input type="text" name="father_occupation"
                            class="form-control <?php echo (!empty($errors["father_occupation"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $father_occupation ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["father_occupation"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Father's Office</label>
                        <input type="text" name="father_office"
                            class="form-control <?php echo (!empty($errors["father_office"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $father_office ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["father_office"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Father's Contact <span class="text-danger">*</span></label>
                        <input type="text" name="father_contact"
                            class="form-control <?php echo (!empty($errors["father_contact"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $father_contact ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["father_contact"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Father's Email</label>
                        <input type="email" name="father_email"
                            class="form-control <?php echo (!empty($errors["father_email"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $father_email ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["father_email"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Mother's Name <span class="text-danger">*</span></label>
                        <input type="text" name="mother_name"
                            class="form-control <?php echo (!empty($errors["mother_name"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $mother_name ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["mother_name"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Mother's Occupation <span class="text-danger">*</span></label>
                        <input type="text" name="mother_occupation"
                            class="form-control <?php echo (!empty($errors["mother_occupation"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $mother_occupation ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["mother_occupation"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Mother's Office</label>
                        <input type="text" name="mother_office"
                            class="form-control <?php echo (!empty($errors["mother_office"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $mother_office ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["mother_office"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Mother's Contact <span class="text-danger">*</span></label>
                        <input type="text" name="mother_contact"
                            class="form-control <?php echo (!empty($errors["mother_contact"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $mother_contact ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["mother_contact"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Mother's Email</label>
                        <input type="email" name="mother_email"
                            class="form-control <?php echo (!empty($errors["mother_email"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $mother_email ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["mother_email"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Guardian Name</label>
                        <input type="text" name="guardian_name"
                            class="form-control <?php echo (!empty($errors["guardian_name"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $guardian_name ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["guardian_name"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Guardian Relation</label>
                        <input type="text" name="guardian_relation"
                            class="form-control <?php echo (!empty($errors["guardian_relation"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $guardian_relation ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["guardian_relation"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Guardian Occupation</label>
                        <input type="text" name="guardian_occupation"
                            class="form-control <?php echo (!empty($errors["guardian_occupation"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $guardian_occupation ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["guardian_occupation"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Guardian Office</label>
                        <input type="text" name="guardian_office"
                            class="form-control <?php echo (!empty($errors["guardian_office"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $guardian_office ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["guardian_office"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Guardian Contact</label>
                        <input type="text" name="guardian_contact"
                            class="form-control <?php echo (!empty($errors["guardian_contact"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $guardian_contact ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["guardian_contact"] ?? ''; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Guardian Email</label>
                        <input type="email" name="guardian_email"
                            class="form-control <?php echo (!empty($errors["guardian_email"])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $guardian_email ?? ''; ?>">
                        <div class="invalid-feedback"><?php echo $errors["guardian_email"] ?? ''; ?></div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <input type="submit" class="btn btn-success px-4" value="Submit">
                        <a href="index.php" class="btn btn-secondary px-4">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
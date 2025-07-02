<div class="form-row">
    <?php include './component/partials/image-preview.php'; ?>
</div>
<?php
$subtitle = "Personal Information";
include './component/partials/form-subtitle.php';
?>
<div class="form-row">
    <div class="form-group">
        <label>First Name <span class="text-danger">*</span></label>
        <input type="text" name="first_name"
            class="form-control <?php echo (!empty($errors["first_name"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $first_name ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["first_name"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Middle Name</label>
        <input type="text" name="middle_name"
            class="form-control <?php echo (!empty($errors["middle_name"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $middle_name ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["middle_name"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Last Name <span class="text-danger">*</span></label>
        <input type="text" name="last_name"
            class="form-control <?php echo (!empty($errors["last_name"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $last_name ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["last_name"] ?? ''; ?></div>
    </div>
</div>
<div class="form-row">
    <div class="form-group">
        <label>Student Image <span class="text-danger">*</span></label>
        <input type="file" id="photo" name="student_image"
            class="form-control p-0 <?php echo (!empty($errors["student_image"])) ? 'is-invalid' : ''; ?>"
            accept="image/*" style="height: fit-content;">
        <div class="invalid-feedback"><?php echo $errors["student_image"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Date of Birth <span class="text-danger">*</span></label>
        <input type="date" name="dob" class="form-control <?php echo (!empty($errors["dob"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $dob; ?>">
        <div class="invalid-feedback"><?php echo $errors["dob"]; ?></div>
    </div>
    <div class="form-group">
        <label>Gender <span class="text-danger">*</span></label>
        <select name="gender" class="form-control <?php echo (!empty($errors["gender"])) ? 'is-invalid' : ''; ?>">
            <option value="">Select</option>
            <option value="Male" <?php echo ($gender == 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo ($gender == 'Female') ? 'selected' : ''; ?>>Female</option>
        </select>
        <div class="invalid-feedback"><?php echo $errors["gender"]; ?></div>
    </div>
    <div class="form-group">
        <label>Blood Group <span class="text-danger">*</span></label>
        <select name="blood_group"
            class="form-control <?php echo (!empty($errors["blood_group"])) ? 'is-invalid' : ''; ?>">
            <option value="">Select</option>
            <option value="A+" <?php echo (isset($blood_group) && $blood_group == 'A+') ? 'selected' : ''; ?>>A+</option>
            <option value="A-" <?php echo (isset($blood_group) && $blood_group == 'A-') ? 'selected' : ''; ?>>A-</option>
            <option value="B+" <?php echo (isset($blood_group) && $blood_group == 'B+') ? 'selected' : ''; ?>>B+</option>
            <option value="B-" <?php echo (isset($blood_group) && $blood_group == 'B-') ? 'selected' : ''; ?>>B-</option>
            <option value="AB+" <?php echo (isset($blood_group) && $blood_group == 'AB+') ? 'selected' : ''; ?>>AB+
            </option>
            <option value="AB-" <?php echo (isset($blood_group) && $blood_group == 'AB-') ? 'selected' : ''; ?>>AB-
            </option>
            <option value="O+" <?php echo (isset($blood_group) && $blood_group == 'O+') ? 'selected' : ''; ?>>O+</option>
            <option value="O-" <?php echo (isset($blood_group) && $blood_group == 'O-') ? 'selected' : ''; ?>>O-</option>
            <option value="Not Known" <?php echo (isset($blood_group) && $blood_group == 'Not Known') ? 'selected' : ''; ?>>Not Known</option>
        </select>
        <div class="invalid-feedback"><?php echo $errors["blood_group"] ?? ''; ?></div>
    </div>
</div>
<div class="form-row">
    <div class="form-group">
        <label>Class <span class="text-danger">*</span></label>
        <select name="class" class="form-control <?php echo (!empty($errors["class"])) ? 'is-invalid' : ''; ?>">
            <option value="">Select</option>
            <option value="Nursary" <?php echo (isset($class) && $class == 'Nursary') ? 'selected' : ''; ?>>Nursary
            </option>
            <option value="LKG" <?php echo (isset($class) && $class == 'LKG') ? 'selected' : ''; ?>>LKG</option>
            <option value="UKG" <?php echo (isset($class) && $class == 'UKG') ? 'selected' : ''; ?>>UKG</option>
            <option value="1" <?php echo (isset($class) && $class == '1') ? 'selected' : ''; ?>>1</option>
            <option value="2" <?php echo (isset($class) && $class == '2') ? 'selected' : ''; ?>>2</option>
            <option value="3" <?php echo (isset($class) && $class == '3') ? 'selected' : ''; ?>>3</option>
        </select>
        <div class="invalid-feedback"><?php echo $errors["class"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Section <span class="text-danger">*</span></label>
        <select name="section" class="form-control <?php echo (!empty($errors["section"])) ? 'is-invalid' : ''; ?>">
            <option value="">Select</option>
            <option value="A" <?php echo (isset($section) && $section == 'A') ? 'selected' : ''; ?>>A</option>
            <option value="B" <?php echo (isset($section) && $section == 'B') ? 'selected' : ''; ?>>B</option>
        </select>
        <div class="invalid-feedback"><?php echo $errors["section"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Roll No <span class="text-danger">*</span></label>
        <input type="text" name="roll_no"
            class="form-control <?php echo (!empty($errors["roll_no"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $roll_no ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["roll_no"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Nationality <span class="text-danger">*</span></label>
        <select name="nationality"
            class="form-control <?php echo (!empty($errors["nationality"])) ? 'is-invalid' : ''; ?>">
            <option value="">Select</option>
            <option value="Nepal" <?php echo (isset($nationality) && $nationality == 'Nepal') ? 'selected' : ''; ?>>Nepal
            </option>
            <option value="India" <?php echo (isset($nationality) && $nationality == 'India') ? 'selected' : ''; ?>>India
            </option>
            <option value="China" <?php echo (isset($nationality) && $nationality == 'China') ? 'selected' : ''; ?>>China
            </option>
            <option value="Bangladesh" <?php echo (isset($nationality) && $nationality == 'Bangladesh') ? 'selected' : ''; ?>>Bangladesh</option>
            <option value="Pakistan" <?php echo (isset($nationality) && $nationality == 'Pakistan') ? 'selected' : ''; ?>>
                Pakistan</option>
            <option value="Sri Lanka" <?php echo (isset($nationality) && $nationality == 'Sri Lanka') ? 'selected' : ''; ?>>Sri Lanka</option>
            <option value="Bhutan" <?php echo (isset($nationality) && $nationality == 'Bhutan') ? 'selected' : ''; ?>>
                Bhutan</option>
            <option value="Maldives" <?php echo (isset($nationality) && $nationality == 'Maldives') ? 'selected' : ''; ?>>
                Maldives</option>
            <option value="Other" <?php echo (isset($nationality) && $nationality == 'Other') ? 'selected' : ''; ?>>Other
            </option>
        </select>
        <div class="invalid-feedback"><?php echo $errors["nationality"] ?? ''; ?></div>
    </div>
</div>
<div class="form-row">
    <div class="form-group">
        <label>Ethnicity <span class="text-danger">*</span></label>
        <select name="ethnicity" class="form-control <?php echo (!empty($errors["ethnicity"])) ? 'is-invalid' : ''; ?>">
            <option value="">Select</option>
            <option value="Brahmin" <?php echo (isset($ethnicity) && $ethnicity == 'Brahmin') ? 'selected' : ''; ?>>
                Brahmin</option>
            <option value="Chhetri" <?php echo (isset($ethnicity) && $ethnicity == 'Chhetri') ? 'selected' : ''; ?>>
                Chhetri</option>
            <option value="Newar" <?php echo (isset($ethnicity) && $ethnicity == 'Newar') ? 'selected' : ''; ?>>Newar
            </option>
            <option value="Tamang" <?php echo (isset($ethnicity) && $ethnicity == 'Tamang') ? 'selected' : ''; ?>>Tamang
            </option>
            <option value="Magar" <?php echo (isset($ethnicity) && $ethnicity == 'Magar') ? 'selected' : ''; ?>>Magar
            </option>
            <option value="Tharu" <?php echo (isset($ethnicity) && $ethnicity == 'Tharu') ? 'selected' : ''; ?>>Tharu
            </option>
            <option value="Gurung" <?php echo (isset($ethnicity) && $ethnicity == 'Gurung') ? 'selected' : ''; ?>>Gurung
            </option>
            <option value="Rai" <?php echo (isset($ethnicity) && $ethnicity == 'Rai') ? 'selected' : ''; ?>>Rai</option>
            <option value="Limbu" <?php echo (isset($ethnicity) && $ethnicity == 'Limbu') ? 'selected' : ''; ?>>Limbu
            </option>
            <option value="Sherpa" <?php echo (isset($ethnicity) && $ethnicity == 'Sherpa') ? 'selected' : ''; ?>>Sherpa
            </option>
            <option value="Other" <?php echo (isset($ethnicity) && $ethnicity == 'Other') ? 'selected' : ''; ?>>Other
            </option>
        </select>
        <div class="invalid-feedback"><?php echo $errors["ethnicity"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Religion <span class="text-danger">*</span></label>
        <select name="religion" class="form-control <?php echo (!empty($errors["religion"])) ? 'is-invalid' : ''; ?>">
            <option value="">Select</option>
            <option value="Hinduism" <?php echo (isset($religion) && $religion == 'Hinduism') ? 'selected' : ''; ?>>
                Hinduism</option>
            <option value="Buddhism" <?php echo (isset($religion) && $religion == 'Buddhism') ? 'selected' : ''; ?>>
                Buddhism</option>
            <option value="Islam" <?php echo (isset($religion) && $religion == 'Islam') ? 'selected' : ''; ?>>Islam
            </option>
            <option value="Kirat" <?php echo (isset($religion) && $religion == 'Kirat') ? 'selected' : ''; ?>>Kirat
            </option>
            <option value="Christianity" <?php echo (isset($religion) && $religion == 'Christianity') ? 'selected' : ''; ?>>Christianity</option>
            <option value="Prakriti" <?php echo (isset($religion) && $religion == 'Prakriti') ? 'selected' : ''; ?>>
                Prakriti</option>
            <option value="Bon" <?php echo (isset($religion) && $religion == 'Bon') ? 'selected' : ''; ?>>Bon</option>
            <option value="Jainism" <?php echo (isset($religion) && $religion == 'Jainism') ? 'selected' : ''; ?>>Jainism
            </option>
            <option value="Sikhism" <?php echo (isset($religion) && $religion == 'Sikhism') ? 'selected' : ''; ?>>Sikhism
            </option>
            <option value="Other" <?php echo (isset($religion) && $religion == 'Other') ? 'selected' : ''; ?>>Other
            </option>
        </select>
        <div class="invalid-feedback"><?php echo $errors["religion"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Native Language <span class="text-danger">*</span></label>
        <select name="native_language"
            class="form-control <?php echo (!empty($errors["native_language"])) ? 'is-invalid' : ''; ?>">
            <option value="">Select</option>
            <option value="Nepali" <?php echo (isset($native_language) && $native_language == 'Nepali') ? 'selected' : ''; ?>>Nepali</option>
            <option value="Maithili" <?php echo (isset($native_language) && $native_language == 'Maithili') ? 'selected' : ''; ?>>Maithili</option>
            <option value="Bhojpuri" <?php echo (isset($native_language) && $native_language == 'Bhojpuri') ? 'selected' : ''; ?>>Bhojpuri</option>
            <option value="Tharu" <?php echo (isset($native_language) && $native_language == 'Tharu') ? 'selected' : ''; ?>>Tharu</option>
            <option value="Tamang" <?php echo (isset($native_language) && $native_language == 'Tamang') ? 'selected' : ''; ?>>Tamang</option>
            <option value="Newar" <?php echo (isset($native_language) && $native_language == 'Newar') ? 'selected' : ''; ?>>Newar</option>
            <option value="Magar" <?php echo (isset($native_language) && $native_language == 'Magar') ? 'selected' : ''; ?>>Magar</option>
            <option value="Awadhi" <?php echo (isset($native_language) && $native_language == 'Awadhi') ? 'selected' : ''; ?>>Awadhi</option>
            <option value="Rai" <?php echo (isset($native_language) && $native_language == 'Rai') ? 'selected' : ''; ?>>
                Rai</option>
            <option value="Limbu" <?php echo (isset($native_language) && $native_language == 'Limbu') ? 'selected' : ''; ?>>Limbu</option>
            <option value="Gurung" <?php echo (isset($native_language) && $native_language == 'Gurung') ? 'selected' : ''; ?>>Gurung</option>
            <option value="Sherpa" <?php echo (isset($native_language) && $native_language == 'Sherpa') ? 'selected' : ''; ?>>Sherpa</option>
            <option value="Urdu" <?php echo (isset($native_language) && $native_language == 'Urdu') ? 'selected' : ''; ?>>
                Urdu</option>
            <option value="Hindi" <?php echo (isset($native_language) && $native_language == 'Hindi') ? 'selected' : ''; ?>>Hindi</option>
            <option value="Other" <?php echo (isset($native_language) && $native_language == 'Other') ? 'selected' : ''; ?>>Other</option>
        </select>
        <div class="invalid-feedback"><?php echo $errors["native_language"] ?? ''; ?></div>
    </div>
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



<!-- <div class="form-group">
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
</div> -->
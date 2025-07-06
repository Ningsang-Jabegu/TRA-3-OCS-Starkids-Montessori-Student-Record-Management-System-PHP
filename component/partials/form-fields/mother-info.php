<?php
$subtitle = "Mother's Detail";
include './component/partials/form-subtitle.php';
?>

<div class="form-row">
    <div class="form-group">
        <label>First Name <span class="text-danger">*</span></label>
        <input type="text" name="mother_first_name"
            class="form-control <?php echo (!empty($errors["mother_first_name"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $mother_first_name ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["mother_first_name"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Middle Name</label>
        <input type="text" name="mother_middle_name"
            class="form-control <?php echo (!empty($errors["mother_middle_name"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $mother_middle_name ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["mother_middle_name"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Last Name <span class="text-danger">*</span></label>
        <input type="text" name="mother_last_name"
            class="form-control <?php echo (!empty($errors["mother_last_name"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $mother_last_name ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["mother_last_name"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Occupation <span class="text-danger">*</span></label>
        <input type="text" name="mother_occupation"
            class="form-control <?php echo (!empty($errors["mother_occupation"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $mother_occupation ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["mother_occupation"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Office Name</label>
        <input type="text" name="mother_office"
            class="form-control <?php echo (!empty($errors["mother_office"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $mother_office ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["mother_office"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Contact Number <span class="text-danger">*</span></label>
        <input type="text" name="mother_contact"
            class="form-control <?php echo (!empty($errors["mother_contact"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $mother_contact ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["mother_contact"] ?? ''; ?></div>
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="mother_email"
            class="form-control <?php echo (!empty($errors["mother_email"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $mother_email ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["mother_email"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Facebook ID</label>
        <input type="text" name="mother_facebook_id"
            class="form-control <?php echo (!empty($errors["mother_facebook_id"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $mother_facebook_id ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["mother_facebook_id"] ?? ''; ?></div>
    </div>
</div>
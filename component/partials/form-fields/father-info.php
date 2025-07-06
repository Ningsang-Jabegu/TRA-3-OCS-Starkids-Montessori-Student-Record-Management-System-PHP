<?php
$subtitle = "Father's Detail";
include './component/partials/form-subtitle.php';
?>
<div class="form-row">
    <div class="form-group">
        <label>First Name <span class="text-danger">*</span></label>
        <input type="text" name="father_first_name"
            class="form-control <?php echo (!empty($errors["father_first_name"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $father_first_name ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["father_first_name"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Middle Name</label>
        <input type="text" name="father_middle_name"
            class="form-control <?php echo (!empty($errors["father_middle_name"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $father_middle_name ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["father_middle_name"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Last Name <span class="text-danger">*</span></label>
        <input type="text" name="father_last_name"
            class="form-control <?php echo (!empty($errors["father_last_name"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $father_last_name ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["father_last_name"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Occupation <span class="text-danger">*</span></label>
        <input type="text" name="father_occupation"
            class="form-control <?php echo (!empty($errors["father_occupation"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $father_occupation ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["father_occupation"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Office Name</label>
        <input type="text" name="father_office"
            class="form-control <?php echo (!empty($errors["father_office"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $father_office ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["father_office"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Contact Number <span class="text-danger">*</span></label>
        <input type="text" name="father_contact"
            class="form-control <?php echo (!empty($errors["father_contact"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $father_contact ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["father_contact"] ?? ''; ?></div>
    </div>

</div>

<div class="form-row">
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="father_email"
            class="form-control <?php echo (!empty($errors["father_email"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $father_email ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["father_email"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Facebook ID</label>
        <input type="text" name="father_facebook_id"
            class="form-control <?php echo (!empty($errors["father_facebook_id"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $father_facebook_id ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["father_facebook_id"] ?? ''; ?></div>
    </div>
</div>
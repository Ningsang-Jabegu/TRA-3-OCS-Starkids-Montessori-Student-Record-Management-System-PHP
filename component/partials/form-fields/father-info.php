<?php
$subtitle = "Father's Details";
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
</div>
<div class="form-row">
    <div class="form-group">
        <label>Occupation <span class="text-danger">*</span></label>
        <input type="text" name="father_occupation"
            class="form-control <?php echo (!empty($errors["father_occupation"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $father_occupation ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["father_occupation"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Office Name</label>
        <input type="text" name="father_office_name"
            class="form-control <?php echo (!empty($errors["father_office_name"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $father_office_name ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["father_office_name"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Office Number</label>
        <input type="text" name="father_office_number"
            class="form-control <?php echo (!empty($errors["father_office_number"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $father_office_number ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["father_office_number"] ?? ''; ?></div>
    </div>
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="father_email"
        class="form-control <?php echo (!empty($errors["father_email"])) ? 'is-invalid' : ''; ?>"
        value="<?php echo $father_email ?? ''; ?>">
    <div class="invalid-feedback"><?php echo $errors["father_email"] ?? ''; ?></div>
</div>
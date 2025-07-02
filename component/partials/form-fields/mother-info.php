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
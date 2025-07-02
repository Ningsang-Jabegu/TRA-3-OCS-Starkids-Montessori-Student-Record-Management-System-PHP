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
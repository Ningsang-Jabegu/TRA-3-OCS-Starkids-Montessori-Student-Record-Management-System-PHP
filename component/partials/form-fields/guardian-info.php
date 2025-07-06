<?php
$subtitle = "Contact Person's Detail";
include './component/partials/form-subtitle.php';
?>

<div class="form-row">
    <div class="form-group">
        <label>First Name <span class="text-danger">*</span></label>
        <input type="text" name="guardian_first_name"
            class="form-control <?php echo (!empty($errors["guardian_first_name"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $guardian_first_name ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["guardian_first_name"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Middle Name</label>
        <input type="text" name="guardian_middle_name"
            class="form-control <?php echo (!empty($errors["guardian_middle_name"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $guardian_middle_name ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["guardian_middle_name"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Last Name <span class="text-danger">*</span></label>
        <input type="text" name="guardian_last_name"
            class="form-control <?php echo (!empty($errors["guardian_last_name"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $guardian_last_name ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["guardian_last_name"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Relation <span class="text-danger">*</span></label>
        <?php include './component/resources/guardian-relation.php'; ?>
        <select name="guardian_relation"
            class="form-control <?php echo (!empty($errors["guardian_relation"])) ? 'is-invalid' : ''; ?>">
            <option value="">Select Relation</option>
            <?php foreach ($guardianRelations as $relation): ?>
                <option value="<?php echo htmlspecialchars($relation); ?>"
                    <?php echo (isset($guardian_relation) && $guardian_relation === $relation) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($relation); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback"><?php echo $errors["guardian_relation"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Occupation <span class="text-danger">*</span></label>
        <input type="text" name="guardian_occupation"
            class="form-control <?php echo (!empty($errors["guardian_occupation"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $guardian_occupation ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["guardian_occupation"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Office Name</label>
        <input type="text" name="guardian_office"
            class="form-control <?php echo (!empty($errors["guardian_office"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $guardian_office ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["guardian_office"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Contact Number <span class="text-danger">*</span></label>
        <input type="text" name="guardian_contact"
            class="form-control <?php echo (!empty($errors["guardian_contact"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $guardian_contact ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["guardian_contact"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="guardian_email"
            class="form-control <?php echo (!empty($errors["guardian_email"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $guardian_email ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["guardian_email"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Facebook ID</label>
        <input type="text" name="guardian_facebook"
            class="form-control <?php echo (!empty($errors["guardian_facebook"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $guardian_facebook ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["guardian_facebook"] ?? ''; ?></div>
    </div>
</div>

<div class="form-row">
    
</div>

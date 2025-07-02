<?php
$subtitle = "Contact Number";
include './component/partials/form-subtitle.php';
?>
<div class="form-row">
    <div class="form-group">
        <label>Residence</label>
        <input type="text" name="residence"
            class="form-control <?php echo (!empty($errors["residence"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $residence ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["residence"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Mobile 1 <span class="text-danger">*</span></label>
        <input type="text" name="mobile_1"
            class="form-control <?php echo (!empty($errors["mobile_1"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $mobile_1 ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["mobile_1"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Mobile 2 <span class="text-danger">*</span></label>
        <input type="text" name="mobile_2"
            class="form-control <?php echo (!empty($errors["mobile_2"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $mobile_2 ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["mobile_2"] ?? ''; ?></div>
    </div>
</div>

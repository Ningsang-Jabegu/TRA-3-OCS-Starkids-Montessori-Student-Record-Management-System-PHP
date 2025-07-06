<?php
$subtitle = "Address Information";
include './component/partials/form-subtitle.php';
?>

<div class="form-row">
    <div class="form-group">
        <label>Permanent Place / Locality <span class="text-danger">*</span></label>
        <input type="text" name="permanent_place"
            class="form-control <?php echo (!empty($errors["permanent_place"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $permanent_place ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["permanent_place"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Permanent District <span class="text-danger">*</span></label>
        <?php
        include_once './component/resources/nepal-district.php';
        $selectedDistrict = $permanent_district ?? 'Kathmandu';
        ?>
        <select name="permanent_district" class="form-control <?php echo (!empty($errors["permanent_district"])) ? 'is-invalid' : ''; ?>">
            <?php foreach ($nepalDistricts as $district): ?>
                <option value="<?php echo htmlspecialchars($district); ?>" <?php echo ($selectedDistrict === $district) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($district); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback"><?php echo $errors["permanent_district"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Permanent Zone <span class="text-danger">*</span></label>
        <?php
        include_once './component/resources/nepal-zone.php';
        $selectedZone = $permanent_zone ?? 'Central';
        ?>
        <select name="permanent_zone" class="form-control <?php echo (!empty($errors["permanent_zone"])) ? 'is-invalid' : ''; ?>">
            <?php foreach ($nepalZones as $zone): ?>
                <option value="<?php echo htmlspecialchars($zone); ?>" <?php echo ($selectedZone === $zone) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($zone); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback"><?php echo $errors["permanent_zone"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Temporary Place / Locality <span class="text-danger">*</span></label>
        <input type="text" name="temporary_place"
            class="form-control <?php echo (!empty($errors["temporary_place"])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $temporary_place ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["temporary_place"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Temporary District <span class="text-danger">*</span></label>
        <?php
        $selectedDistrict = $temporary_district ?? 'Kathmandu';
        ?>
        <select name="temporary_district" class="form-control <?php echo (!empty($errors["temporary_district"])) ? 'is-invalid' : ''; ?>">
            <?php foreach ($nepalDistricts as $district): ?>
                <option value="<?php echo htmlspecialchars($district); ?>" <?php echo ($selectedDistrict === $district) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($district); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback"><?php echo $errors["temporary_district"] ?? ''; ?></div>
    </div>
    <div class="form-group">
        <label>Temporary Zone <span class="text-danger">*</span></label>
        <?php
        include_once './component/resources/nepal-zone.php';
        $selectedZone = $temporary_zone ?? 'Central';
        ?>
        <select name="temporary_zone" class="form-control <?php echo (!empty($errors["temporary_zone"])) ? 'is-invalid' : ''; ?>">
            <?php foreach ($nepalZones as $zone): ?>
                <option value="<?php echo htmlspecialchars($zone); ?>" <?php echo ($selectedZone === $zone) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($zone); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback"><?php echo $errors["temporary_zone"] ?? ''; ?></div>
    </div>
</div>

<div class="form-row">
    
</div>
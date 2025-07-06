<p style="margin: auto 0 0 0; font-weight: 500;">Please provide appropriate suggestions to improve the quality of
    service.</p>
<hr style="border: 1px solid rgba(0, 0, 0, .1); margin:0 0 20px 0;">

<div class="form-group">
    <label>Who recommended Star Kids Pre-School and what factors led you to apply?</label>
    <input type="text" name="recommendation_factors"
        class="form-control <?php echo (!empty($errors["recommendation_factors"])) ? 'is-invalid' : ''; ?>"
        value="<?php echo $recommendation_factors ?? ''; ?>">
    <div class="invalid-feedback"><?php echo $errors["recommendation_factors"] ?? ''; ?></div>
</div>

<div class="form-group">
    <label>How does your child react when he/she is upset?</label>
    <input type="text" name="child_reaction"
        class="form-control <?php echo (!empty($errors["child_reaction"])) ? 'is-invalid' : ''; ?>"
        value="<?php echo $child_reaction ?? ''; ?>">
    <div class="invalid-feedback"><?php echo $errors["child_reaction"] ?? ''; ?></div>
</div>

<div class="form-group">
    <label>In case of an emergency, where would you like your child to be treated? (Mention the nearest hospital’s
        name)</label>
    <input type="text" name="emergency_hospital"
        class="form-control <?php echo (!empty($errors["emergency_hospital"])) ? 'is-invalid' : ''; ?>"
        value="<?php echo $emergency_hospital ?? ''; ?>">
    <div class="invalid-feedback"><?php echo $errors["emergency_hospital"] ?? ''; ?></div>
</div>

<div class="form-row-row">
    <h4 class="admission-form-detail-title">Attitude</h4>
    <div class="form-column">
        <div class="form-group">
            <label>Positive Attitude:</label>
            <input type="text" name="positive_attitude"
                class="form-control <?php echo (!empty($errors["positive_attitude"])) ? 'is-invalid' : ''; ?>"
                value="<?php echo $positive_attitude ?? ''; ?>">
            <div class="invalid-feedback"><?php echo $errors["positive_attitude"] ?? ''; ?></div>
        </div>
        <div class="form-group">
            <label>Negative Attitude:</label>
            <input type="text" name="negative_attitude"
                class="form-control <?php echo (!empty($errors["negative_attitude"])) ? 'is-invalid' : ''; ?>"
                value="<?php echo $negative_attitude ?? ''; ?>">
            <div class="invalid-feedback"><?php echo $errors["negative_attitude"] ?? ''; ?></div>
        </div>
    </div>

</div>

<div class="form-row-row">
    <h4 class="admission-form-detail-title">Interest</h4>
    <div class="form-column">
        <div class="form-group">
            <label>Interested:</label>
            <input type="text" name="interested"
                class="form-control <?php echo (!empty($errors["interested"])) ? 'is-invalid' : ''; ?>"
                value="<?php echo $interested ?? ''; ?>">
            <div class="invalid-feedback"><?php echo $errors["interested"] ?? ''; ?></div>
        </div>
        <div class="form-group">
            <label>Not Interested:</label>
            <input type="text" name="not_interested"
                class="form-control <?php echo (!empty($errors["not_interested"])) ? 'is-invalid' : ''; ?>"
                value="<?php echo $not_interested ?? ''; ?>">
            <div class="invalid-feedback"><?php echo $errors["not_interested"] ?? ''; ?></div>
        </div>
    </div>
</div>

<div class="form-group">
    <label>Health Status:</label>
    <input type="text" name="health_status"
        class="form-control <?php echo (!empty($errors["health_status"])) ? 'is-invalid' : ''; ?>"
        value="<?php echo $health_status ?? ''; ?>">
    <div class="invalid-feedback"><?php echo $errors["health_status"] ?? ''; ?></div>
</div>
<div class="form-row">
    <div class="form-group">
        <label for="declaration_date">Date</label>
        <input type="date"
            class="form-control <?php echo (!empty($errors["declaration_date"])) ? 'is-invalid' : ''; ?>"
            id="declaration_date"
            name="declaration_date"
            value="<?php echo $declaration_date ?? date('Y-m-d'); ?>">
        <div class="invalid-feedback"><?php echo $errors["declaration_date"] ?? ''; ?></div>
    </div>

    <div class="form-group">
        <label for="father_signature">Signature of Father (Initial: eg. NJ)</label>
        <input type="text"
            class="form-control <?php echo (!empty($errors["father_signature"])) ? 'is-invalid' : ''; ?>"
            id="father_signature"
            name="father_signature"
            placeholder="Father's Signature"
            value="<?php echo $father_signature ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["father_signature"] ?? ''; ?></div>
    </div>

    <div class="form-group">
        <label for="mother_signature">Signature of Mother (Initial: eg. ST)</label>
        <input type="text"
            class="form-control <?php echo (!empty($errors["mother_signature"])) ? 'is-invalid' : ''; ?>"
            id="mother_signature"
            name="mother_signature"
            placeholder="Mother's Signature"
            value="<?php echo $mother_signature ?? ''; ?>">
        <div class="invalid-feedback"><?php echo $errors["mother_signature"] ?? ''; ?></div>
    </div>
</div>

<p>
    <span>Sir/Madam,</span><br />
    <span>
        I request for the admission of my son/daughter in StarKids Montessori Pre-School. I promise to abide by the
        school’s policies, rules and regulations regarding fee payments, student conduct and other school matters.
    </span>
</p>

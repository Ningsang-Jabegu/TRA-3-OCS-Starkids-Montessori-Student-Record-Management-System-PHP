<div class="form-row">
    <div class="form-group">
        <label for="progress_report">Child's Progress Report <span class="text-danger">*</span></label>
        <input type="file"
            class="form-control p-0 <?php echo (!empty($errors["progress_report"])) ? 'is-invalid' : ''; ?>"
            id="progress_report"
            name="progress_report"
            accept=".pdf,.jpg,.jpeg,.png"
            style="height: fit-content;">
        <div class="invalid-feedback"><?php echo $errors["progress_report"] ?? ''; ?></div>
        <div id="progress_report_preview" class="file-preview mt-2"></div>
    </div>

    <div class="form-group">
        <label for="birth_certificate">Birth Certificate <span class="text-danger">*</span></label>
        <input type="file"
            class="form-control p-0 <?php echo (!empty($errors["birth_certificate"])) ? 'is-invalid' : ''; ?>"
            id="birth_certificate"
            name="birth_certificate"
            accept=".pdf,.jpg,.jpeg,.png"
            style="height: fit-content;">
        <div class="invalid-feedback"><?php echo $errors["birth_certificate"] ?? ''; ?></div>
        <div id="birth_certificate_preview" class="file-preview mt-2"></div>
    </div>

    <div class="form-group">
        <label for="medical_record">Medical and Immunization Record <span class="text-danger">*</span></label>
        <input type="file"
            class="form-control p-0 <?php echo (!empty($errors["medical_record"])) ? 'is-invalid' : ''; ?>"
            id="medical_record"
            name="medical_report"
            accept=".pdf,.jpg,.jpeg,.png"
            style="height: fit-content;">
        <div class="invalid-feedback"><?php echo $errors["medical_record"] ?? ''; ?></div>
        <div id="medical_record_preview" class="file-preview mt-2"></div>
    </div>
</div>

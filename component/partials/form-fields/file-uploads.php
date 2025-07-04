<div class="form-row">
    <div class="form-group">
        <label for="progress_report">Child's Progress Report <span class="text-danger">*</span></label>
        <input type="file" class="form-control p-0 <?php echo (!empty($errors["student_progress_report"])) ? 'is-invalid' : ''; ?>" id="progress_report" name="progress_report"
            accept=".pdf,.jpg,.jpeg,.png" required style="height: fit-content;">
        <div id="progress_report_preview" class="file-preview mt-2"></div>
    </div>

    <div class="form-group">
        <label for="birth_certificate">Birth Certificate <span class="text-danger">*</span></label>
        <input type="file" class="form-control p-0 <?php echo (!empty($errors["student_birth_certificate"])) ? 'is-invalid' : ''; ?>" id="birth_certificate" name="birth_certificate"
            accept=".pdf,.jpg,.jpeg,.png" required style="height: fit-content;">
        <div id="birth_certificate_preview" class="file-preview mt-2"></div>
    </div>

    <div class="form-group">
        <label for="medical_record">Medical and Immunization Record <span class="text-danger">*</span></label>
        <input type="file" class="form-control p-0 <?php echo (!empty($errors["student_medical_report"])) ? 'is-invalid' : ''; ?>" id="medical_record" name="medical_record" accept=".pdf,.jpg,.jpeg,.png"
            required style="height: fit-content;">
        <div id="medical_record_preview" class="file-preview mt-2"></div>
    </div>
</div>
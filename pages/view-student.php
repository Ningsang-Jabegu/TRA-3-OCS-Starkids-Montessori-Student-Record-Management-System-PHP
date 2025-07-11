<div class="container py-4">
    <h2 class="mb-4 text-center">View Student Record</h2>
    <div class="card h-100 shadow-sm mb-4" style="border-radius: 25px; overflow: hidden;">
        <div class="card-header bg-dark text-white" style="background-color: #1A2236;">
            Student Uploaded Files
        </div>
        <div class="view-student-row">
            <!-- Student Image -->
            <div class="mb-3" style="">
                <figure class="text-center">
                    <?php if (!empty($student['student_image'])): ?>
                        <?php
                        $file = $student['student_image'];
                        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        $studentName = isset($student['student_name']) ? $student['student_name'] : 'Student';
                        $alt = htmlspecialchars($studentName . "'s Image");
                        $filePath = "./web/student_images/" . htmlspecialchars($file);
                        ?>
                        <?php if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'])): ?>
                            <img src="<?php echo $filePath; ?>" alt="<?php echo $alt; ?>" style="max-width:200px;">
                        <?php elseif ($ext === 'pdf'): ?>
                            <a href="<?php echo $filePath; ?>" target="_blank" class="btn btn-outline-primary">View PDF</a>
                        <?php else: ?>
                            <a href="<?php echo $filePath; ?>" target="_blank" class="btn btn-outline-secondary">Download
                                File</a>
                        <?php endif; ?>
                        <figcaption class="mt-2 font-weight-bold" style="color: #000;">Student Image</figcaption>
                    <?php else: ?>
                        <figcaption class="font-weight-bold" style="color: #000;">Student Image not uploaded into the
                            system.
                        </figcaption>
                    <?php endif; ?>
                </figure>
            </div>

            <!-- Student Progress Report -->
            <div class="mb-3">
                <figure class="text-center">
                    <?php if (!empty($student['student_progress_report'])): ?>
                        <?php
                        $file = $student['student_progress_report'];
                        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        $studentName = isset($student['student_name']) ? $student['student_name'] : 'Student';
                        $alt = htmlspecialchars($studentName . "'s Progress Report");
                        $filePath = "./web/student_progress_reports/" . htmlspecialchars($file);
                        ?>
                        <?php if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'])): ?>
                            <img src="<?php echo $filePath; ?>" alt="<?php echo $alt; ?>" style="max-width:200px;">
                        <?php elseif ($ext === 'pdf'): ?>
                            <a href="<?php echo $filePath; ?>" target="_blank" class="btn btn-outline-primary">View PDF</a>
                        <?php else: ?>
                            <a href="<?php echo $filePath; ?>" target="_blank" class="btn btn-outline-secondary">Download
                                File</a>
                        <?php endif; ?>
                        <figcaption class="mt-2 font-weight-bold" style="color: #000;">Student Progress Report</figcaption>
                    <?php else: ?>
                        <figcaption class="font-weight-bold" style="color: #000;">Student Progress Report not uploaded into
                            the
                            system.
                        </figcaption>
                    <?php endif; ?>
                </figure>
            </div>

            <!-- Student Birth Certificate -->
            <div class="mb-3">
                <figure class="text-center">
                    <?php if (!empty($student['student_birth_certificate'])): ?>
                        <?php
                        $file = $student['student_birth_certificate'];
                        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        $alt = htmlspecialchars($studentName . "'s Birth Certificate");
                        $filePath = "./web/student_birth_certificates/" . htmlspecialchars($file);
                        ?>
                        <?php if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'])): ?>
                            <img src="<?php echo $filePath; ?>" alt="<?php echo $alt; ?>" style="max-width:200px;">
                        <?php elseif ($ext === 'pdf'): ?>
                            <a href="<?php echo $filePath; ?>" target="_blank" class="btn btn-outline-primary">View PDF</a>
                        <?php else: ?>
                            <a href="<?php echo $filePath; ?>" target="_blank" class="btn btn-outline-secondary">Download
                                File</a>
                        <?php endif; ?>
                        <figcaption class="mt-2 font-weight-bold " style="color:#000;">Student Birth Certificate
                        </figcaption>
                    <?php else: ?>
                        <figcaption class="font-weight-bold " style="color:#000;">Student Birth Certificate not uploaded
                            into the
                            system.</figcaption>
                    <?php endif; ?>
                </figure>
            </div>

            <!-- Student Medical Report -->
            <div class="mb-3">
                <figure class="text-center">
                    <?php if (!empty($student['student_medical_report'])): ?>
                        <?php
                        $file = $student['student_medical_report'];
                        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        $alt = htmlspecialchars($studentName . "'s Medical Report");
                        $filePath = "./web/student_medical_reports/" . htmlspecialchars($file);
                        ?>
                        <?php if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'])): ?>
                            <img src="<?php echo $filePath; ?>" alt="<?php echo $alt; ?>" style="max-width:200px;">
                        <?php elseif ($ext === 'pdf'): ?>
                            <a href="<?php echo $filePath; ?>" target="_blank" class="btn btn-outline-primary">View PDF</a>
                        <?php else: ?>
                            <a href="<?php echo $filePath; ?>" target="_blank" class="btn btn-outline-secondary">Download
                                File</a>
                        <?php endif; ?>
                        <figcaption class="mt-2 font-weight-bold" style="color:#000;">Student Medical Report</figcaption>
                    <?php else: ?>
                        <figcaption class="font-weight-bold" style="color:#000;">Student Medical Report not uploaded into
                            the
                            system.
                        </figcaption>
                    <?php endif; ?>
                </figure>
            </div>
        </div>
    </div>


    <?php
    $sections = [
        'Student Information' => $student,
        'Father\'s Information' => $father,
        'Mother\'s Information' => $mother,
        'Guardian\'s Information' => $guardian,
    ];

    foreach ($sections as $title => $data): ?>
        <div class="mb-4">
            <div class="card h-100 shadow-sm" style="border-radius: 25px; overflow: hidden;">
                <div class="card-header bg-dark text-white" style="background-color: #1A2236;">
                    <?php echo $title; ?>
                </div>
                <div class="card-body">
                    <?php foreach ($data as $field => $value): ?>
                        <div class="mb-2">
                            <label class="font-weight-bold mr-2" style="width: 200px; color: #000;">
                                <?php echo ucwords(str_replace('_', ' ', $field)); ?>
                            </label><span style="margin:0 10px">:</span>
                            <span style="color: #000"><?php echo htmlspecialchars($value); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="form-group d-flex justify-content-between">
        <div class="text-center mt-3">
            <a href="edit_student.php?id=<?php echo urlencode($student['id']); ?>" class="btn btn-success px-4">
                Update Record
            </a>
        </div>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-secondary px-4">Back</a>
        </div>
    </div>
</div>
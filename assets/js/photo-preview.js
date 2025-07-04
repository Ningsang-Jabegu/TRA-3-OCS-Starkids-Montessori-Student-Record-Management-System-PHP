document.addEventListener('DOMContentLoaded', function () {
    const previewConfigs = [
        { inputId: 'photo', previewId: 'student-photo-preview', removeTextId: 'recent-photo-text' },
        { inputId: 'progress_report', previewId: 'progress_report_preview' },
        { inputId: 'birth_certificate', previewId: 'birth_certificate_preview' },
        { inputId: 'medical_record', previewId: 'medical_record_preview' }
    ];

    previewConfigs.forEach(config => {
        const input = document.getElementById(config.inputId);
        const previewDiv = document.getElementById(config.previewId);
        const removeText = config.removeTextId ? document.getElementById(config.removeTextId) : null;

        if (!input || !previewDiv) return;

        input.addEventListener('change', function () {
            previewDiv.innerHTML = '';

            if (!this.files || !this.files[0]) return;

            const file = this.files[0];
            const reader = new FileReader();

            if (file.type.startsWith('image/')) {
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Preview Image';
                    img.style.width = '100%';
                    img.style.zIndex = '1';
                    img.style.height = '100%';
                    img.style.objectFit = 'cover';
                    previewDiv.appendChild(img);

                    if (removeText) removeText.remove();
                };
                reader.readAsDataURL(file);
            } else if (file.type === 'application/pdf') {
                const link = document.createElement('a');
                link.href = URL.createObjectURL(file);
                link.target = '_blank';
                link.textContent = 'View PDF';
                link.className = 'btn btn-outline-primary btn-sm';
                previewDiv.appendChild(link);
            } else {
                const span = document.createElement('span');
                span.textContent = `Unsupported file: ${file.name}`;
                span.style.color = 'red';
                previewDiv.appendChild(span);
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const previewDiv = document.getElementById('student-photo-preview');
    const photoInput = document.getElementById('photo');
    const recentPhotoText = document.getElementById('recent-photo-text');

    photoInput.addEventListener('change', function () {
        previewDiv.innerHTML = '';
        if (this.files && this.files[0] && this.files[0].type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                previewDiv.appendChild(img);
                if (recentPhotoText) recentPhotoText.remove();
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
});

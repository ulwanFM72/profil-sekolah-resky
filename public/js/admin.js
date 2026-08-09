document.addEventListener('DOMContentLoaded', function () {

    // Toggle sidebar (mobile)
    const toggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('adminSidebar');
    if (toggle && sidebar) {
        toggle.addEventListener('click', () => sidebar.classList.toggle('show'));
    }

    // Konfirmasi hapus data
    document.querySelectorAll('.btn-delete-confirm').forEach(form => {
        form.addEventListener('submit', function (e) {
            const msg = this.getAttribute('data-confirm') || 'Yakin ingin menghapus data ini?';
            if (!confirm(msg)) e.preventDefault();
        });
    });

    // Preview gambar sebelum upload
    document.querySelectorAll('.image-input-preview').forEach(input => {
        input.addEventListener('change', function () {
            const previewId = this.getAttribute('data-preview');
            const preview = document.getElementById(previewId);
            if (this.files && this.files[0] && preview) {
                const reader = new FileReader();
                reader.onload = e => { preview.src = e.target.result; preview.style.display = 'block'; };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    // Auto-dismiss alert
    document.querySelectorAll('.alert').forEach(alert => {
        setTimeout(() => {
            if (window.bootstrap) {
                const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                bsAlert.close();
            }
        }, 5000);
    });

});

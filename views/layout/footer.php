</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script>
        // Global function for showing alerts
        function showAlert(title, text, type) {
            Sweetalert2.fire({
                title: title,
                text: text,
                icon: type,
                confirmButtonText: 'OK'
            });
        }
    </script>
</body>
</html>
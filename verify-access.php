<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protected PDF Access</title>
    <script>
        function verifyAccess() {
            const userCode = document.getElementById("accessCode").value;
            const correctCode = "1234"; // Kode proteksi yang diharapkan
            const pdfContainer = document.getElementById("pdf-container");

            if (userCode === correctCode) {
                // Tampilkan PDF jika kode benar
                pdfContainer.innerHTML = `
                    <iframe src="../assets/inventory.pdf" width="100%" height="600px"></iframe>
                `;
            } else {
                alert("Kode salah! Silakan coba lagi.");
            }
        }
    </script>
</head>
<body>
    <h3>Protected PDF Viewer</h3>
    <p>Masukkan kode akses untuk melihat file PDF:</p>
    <input type="password" id="accessCode" placeholder="Masukkan kode akses">
    <button onclick="verifyAccess()">Submit</button>
    
    <div id="pdf-container" style="margin-top: 20px;">
        <!-- PDF akan muncul di sini setelah verifikasi -->
    </div>
</body>
</html>

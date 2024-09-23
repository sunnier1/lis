<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>
<body>
    <table id="inventory-table" border="1">
        <thead>
            <tr colspan="4">
                <th>Room1</th>
            </tr>
            <tr>
                <th>No.</th>
                <th>Item</th>
                <th>Type</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1. </td>
                <td>Table</td>
                <td>Permanen</td>
                <td>2</td>
            </tr>
            <tr>
                <td>2. </td>
                <td>Chair</td>
                <td>Permanen</td>
                <td>1</td>
            </tr>
            <tr>
                <td>3. </td>
                <td>Cupboard</td>
                <td>Permanen</td>
                <td>4</td>
            </tr>
        </tbody>
    </table>

    <button onclick="generatePDF()">Download PDF</button>
    <button onclick="generateExcel()">Download Excel</button>
    <button onclick="generateQR()">Generate QR Code</button>
    
    <div id="qrcode"></div>
    
    <script>
        // Function to generate PDF from the table
        function generatePDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            doc.text("Inventory Table", 10, 10);
            doc.autoTable({ html: '#inventory-table' });
            doc.save('inventory.pdf');
        }

        // Function to generate Excel from the table
        function generateExcel() {
            var table = document.getElementById('inventory-table');
            var workbook = XLSX.utils.table_to_book(table, {sheet:"Sheet1"});
            XLSX.writeFile(workbook, 'inventory.xlsx');
        }

        // Function to generate QR code that links to a protected PDF
        function generateQR() {
            const qrContainer = document.getElementById('qrcode');
            qrContainer.innerHTML = ""; // Clear previous QR
            var qrCode = new QRCode(qrContainer, {
                text: "https://yourwebsite.com/verify-access", // URL menuju halaman verifikasi
                width: 128,
                height: 128,
            });
        }
    </script>
</body>
</html>

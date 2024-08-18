$(document).ready(function() {
    // untuk export halaman menjadi dokumen pdf
    $('#export-pdf').on('click', function() {
        const {
            jsPDF
        } = window.jspdf; // Mengakses jsPDF dari UMD
        var element = $('#document-pdf')[0];

        // Set scale di html2canvas untuk meningkatkan resolusi
        html2canvas(element, {
            scale: 3 // Meningkatkan skala untuk resolusi yang lebih tinggi
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');
            var pdf = new jsPDF({
                orientation: 'portrait',
                unit: 'mm',
                format: 'a4',
            });

            // Tentukan ukuran kertas dan margin
            var margin = 10; // margin dalam satuan mm
            var imgWidth = 210 - 2 * margin; // Lebar A4 dikurangi margin kiri dan kanan
            var pageHeight = 297 - 2 * margin; // Tinggi A4 dikurangi margin atas dan bawah
            var imgHeight = (canvas.height * imgWidth) / canvas.width;
            var heightLeft = imgHeight;
            var position = margin;

            // Menambahkan gambar dengan kualitas tinggi
            pdf.addImage(imgData, 'PNG', margin, position, imgWidth, imgHeight, undefined,
                'FAST');
            heightLeft -= pageHeight;

            while (heightLeft >= 0) {
                position = heightLeft - imgHeight + margin;
                pdf.addPage();
                pdf.addImage(imgData, 'PNG', margin, position, imgWidth, imgHeight,
                    undefined, 'FAST');
                heightLeft -= pageHeight;
            }

            pdf.save('financial_report_high_res.pdf');

            // Membuka PDF dalam tab baru
            // const string = pdf.output('datauristring');
            // const iframe = "<iframe width='100%' height='100%' src='" + string +
            //     "'></iframe>";
            // const printWindow = window.open();
            // printWindow.document.write(iframe);
            // printWindow.document.close();
            // printWindow.focus();
            // printWindow.print();
            // printWindow.close();

        });
    });

    // untuk cetak halaman web tertentu
    $('#print').on('click', function() {
        const {
            jsPDF
        } = window.jspdf; // Mengakses jsPDF dari UMD
        var element = $('#document-print')[0];

        // Set scale di html2canvas untuk meningkatkan resolusi
        html2canvas(element, {
            scale: 3 // Meningkatkan skala untuk resolusi yang lebih tinggi
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');
            var pdf = new jsPDF({
                orientation: 'portrait',
                unit: 'mm',
                format: 'a4',
            });

            // Tentukan ukuran kertas dan margin
            var margin = 10; // margin dalam satuan mm
            var imgWidth = 210 - 2 * margin; // Lebar A4 dikurangi margin kiri dan kanan
            var pageHeight = 297 - 2 * margin; // Tinggi A4 dikurangi margin atas dan bawah
            var imgHeight = (canvas.height * imgWidth) / canvas.width;
            var heightLeft = imgHeight;
            var position = margin;

            // Menambahkan gambar dengan kualitas tinggi
            pdf.addImage(imgData, 'PNG', margin, position, imgWidth, imgHeight, undefined,
                'FAST');
            heightLeft -= pageHeight;

            while (heightLeft >= 0) {
                position = heightLeft - imgHeight + margin;
                pdf.addPage();
                pdf.addImage(imgData, 'PNG', margin, position, imgWidth, imgHeight,
                    undefined, 'FAST');
                heightLeft -= pageHeight;
            }

            // pdf.save('financial_report_high_res.pdf');

            // Membuka PDF dalam tab baru
            // const string = pdf.output('datauristring');
            // const iframe = "<iframe width='100%' height='100%' src='" + string +
            //     "'></iframe>";
            // const printWindow = window.open();
            // printWindow.document.write(iframe);
            // printWindow.document.close();
            // printWindow.focus();
            // printWindow.print();
            // printWindow.close();

            // Membuat Blob dari PDF
            const pdfBlob = pdf.output('blob');

            // Membuat URL objek dari Blob
            const url = URL.createObjectURL(pdfBlob);
            const printWindow = window.open(url, '_blank');
            
            // Mengatur jendela cetak untuk mencetak ketika selesai memuat
            printWindow.onload = function() {
                printWindow.focus();
                printWindow.print();
                printWindow.onafterprint = function() {
                    printWindow.close();
                    URL.revokeObjectURL(url);
                };
                // printWindow.close();
            };

        });
    });
});
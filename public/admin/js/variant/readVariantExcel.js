// Handle file input change event
document.getElementById("importFile").addEventListener("change", handleFileSelect);

// Function to handle file selection
function handleFileSelect(event) {
    const fileInput = event.target;
    const previewContainer = document.getElementById("importData");

    // Check if a file is selected
    if (fileInput.files.length > 0) {
        const selectedFile = fileInput.files[0];

        // Read the selected file using FileReader
        const reader = new FileReader();
        reader.onload = function (e) {
            const data = new Uint8Array(e.target.result);

            // Parse the Excel file using SheetJS
            const workbook = XLSX.read(data, {
                type: "array",
            });

            // Display the preview (you may customize this based on your needs)
            const previewHTML = XLSX.utils.sheet_to_html(
                workbook.Sheets[workbook.SheetNames[0]]
            );
            previewContainer.innerHTML = previewHTML;
        };

        // Read the file as an array buffer
        reader.readAsArrayBuffer(selectedFile);
    } else {
        previewContainer.innerHTML = ""; // Clear the preview if no file is selected
    }
}


// Add the CSS styles for the table
const styles = `
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: Arial, sans-serif;
            color: #333;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-left : 1px solid #ddd
        }

        th {
            background-color: #f2f2f2;
        }

        thead {
            background-color: grey;
            color: white; /* Set text color for thead */
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }
    </style>
`;

document.head.insertAdjacentHTML('beforeend', styles);

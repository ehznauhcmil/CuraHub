fetch('medical-record-get.php')
    .then(response => response.text()) // Change to .text() to inspect raw response
    .then(data => {
        console.log(data); // Log the response to the console
        try {
            const records = JSON.parse(data); // Try to parse it as JSON
            const tableBody = document.getElementById('medicalRecordsTable').getElementsByTagName('tbody')[0];
            records.forEach(record => {
                const newRow = tableBody.insertRow();
                Object.values(record).forEach(value => {
                    const cell = newRow.insertCell();
                    cell.textContent = value;
                });
            });
        } catch (e) {
            console.error('Failed to parse JSON:', e);
        }
    })
    .catch(error => console.error('Fetch error:', error));

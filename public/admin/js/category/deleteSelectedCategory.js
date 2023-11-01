// Function to check/uncheck all checkboxes
function checkAll(checkbox) {
    const checkboxes = document.getElementsByClassName('checkbox_ids');
    for (const cb of checkboxes) {
        cb.checked = checkbox.checked;
    }
}

document.getElementById('deleteAllSelectedRecord').addEventListener('click', function() {
    const checkboxes = document.getElementsByClassName('checkbox_ids');
    const selectedIds = [];

    for (const checkbox of checkboxes) {
        if (checkbox.checked) {
            selectedIds.push(parseInt(checkbox.value));
        }
    }

    if (selectedIds.length === 0) {
        alert('Please select at least one Category to delete.');
    } else {
        const form = document.getElementById('deleteMultipleForm');
        const idsInput = document.createElement('input');
        idsInput.type = 'hidden';
        idsInput.name = 'ids';
        idsInput.value = JSON.stringify(selectedIds);
        form.appendChild(idsInput);

        form.submit();
    }
});

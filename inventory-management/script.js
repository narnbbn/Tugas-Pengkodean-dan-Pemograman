let productId = 1;

document.getElementById('productForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const productName = document.getElementById('productName').value;
    const productQuantity = document.getElementById('productQuantity').value;
    const productPrice = document.getElementById('productPrice').value;

    const tableBody = document.getElementById('productTableBody');
    const newRow = document.createElement('tr');
    newRow.className = "hover:bg-gray-50 transition-colors duration-150";

    newRow.innerHTML = `
        <td class="py-4 px-6 border-b">${productId++}</td>
        <td class="py-4 px-6 border-b">${productName}</td>
        <td class="py-4 px-6 border-b">${productQuantity}</td>
        <td class="py-4 px-6 border-b">Rp ${Number(productPrice).toLocaleString()}</td>
        <td class="py-4 px-6 border-b">
            <button class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-300 transition-all duration-200" onclick="deleteRow(this)">Hapus</button>
        </td>
    `;

    tableBody.appendChild(newRow);
    document.getElementById('productForm').reset();
});

function deleteRow(button) {
    const row = button.parentElement.parentElement;
    row.remove();
}

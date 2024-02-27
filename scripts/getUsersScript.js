fetch("getUserData.php")
.then(response => {
    if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return response.json();
})
.then(data => {
    displayData(data);
})
.catch(error => {
    console.error('Fetch error:', error);
});

// Display the data on the page
function displayData(data) {
    var output = document.getElementById("users");

    // Create a table
    var table = document.createElement("table");
    table.className="table"

    // Create table header
    var headerRow = table.insertRow(0);
    headerRow.insertCell(0).innerHTML = "<b>ID</b>";
    headerRow.insertCell(1).innerHTML = "<b>Name</b>";
    headerRow.insertCell(2).innerHTML = "<b>Email</b>";
    headerRow.insertCell(3).innerHTML = "<b>Action</b>";

    // populate the table
    data.forEach(function (item) {
        var row = table.insertRow(-1);
        row.insertCell(0).textContent = item.id;
        row.insertCell(1).textContent = item.name;
        row.insertCell(2).textContent = item.email
        // create links
        var editLink=document.createElement("a");
        editLink.href="edit_user.html?id="+item.id;
        editLink.textContent="Edit";
        var deleteLink = document.createElement("a");
        deleteLink.href = "delete_user.php?id=" + item.id;
        deleteLink.textContent = "Delete";
        var cell = row.insertCell(3);
        cell.appendChild(editLink);
        cell.appendChild(document.createTextNode("  |  "));
        cell.appendChild(deleteLink);
    });

    // Append the table to the output div
    output.appendChild(table);
}
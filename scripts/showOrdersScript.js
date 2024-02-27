fetch("getOrdersData.php")
.then(response => {
    if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return response.json();
})
.then(data => {
    displayTankData(data);
})
.catch(error => {
    console.error('Fetch error:', error);
});

function displayTankData(data){
    var out=document.getElementById("orders");

    var table=document.createElement("table");
    table.className="table";

    var headerRow=table.insertRow(0);

    headerRow.insertCell(0).innerHTML="Hull Type";
    headerRow.insertCell(1).innerHTML="Calibre";
    headerRow.insertCell(2).innerHTML="Chassis";
    headerRow.insertCell(3).innerHTML="Addons";
    headerRow.insertCell(4).innerHTML="Price";
    headerRow.insertCell(5).innerHTML="Time Of Order";

    headerRow.insertCell(6).innerHTML="Action"

    data.forEach(function (item){
        var row=table.insertRow(-1);

        row.insertCell(0).textContent=item.hullType
        row.insertCell(1).textContent=item.calibre
        row.insertCell(2).textContent=item.chassis
        row.insertCell(3).textContent=item.addons
        row.insertCell(4).textContent=item.price
        row.insertCell(5).textContent=item.timeOfOrder

        var editLink = document.createElement("a");
        editLink.href="edit_order.html?id="+item.id+"&userID="+item.user_id;
        editLink.textContent="Edit"
        var deleteLink = document.createElement("a");
        deleteLink.href = "user_delete_order.php?id=" + item.id;
        deleteLink.textContent = "Delete";
        var cell = row.insertCell(6);
        cell.appendChild(editLink);
        cell.appendChild(document.createTextNode(" | "));
        cell.appendChild(deleteLink);
    });

    out.appendChild(table);
}


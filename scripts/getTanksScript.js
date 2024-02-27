fetch("getTankData.php")
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
    var out=document.getElementById("tankconfig");

    var table=document.createElement("table");
    table.className="table";

    var headerRow=table.insertRow(0);
    headerRow.insertCell(0).innerHTML="ID";
    headerRow.insertCell(1).innerHTML="Hull Type";
    headerRow.insertCell(2).innerHTML="Calibre";
    headerRow.insertCell(3).innerHTML="Chassis";
    headerRow.insertCell(4).innerHTML="Addons";
    headerRow.insertCell(5).innerHTML="Price";
    headerRow.insertCell(6).innerHTML="Time Of Order";
    headerRow.insertCell(7).innerHTML="User ID";
    headerRow.insertCell(8).innerHTML="Action"

    data.forEach(function (item){
        var row=table.insertRow(-1);
        row.insertCell(0).textContent=item.id
        row.insertCell(1).textContent=item.hullType
        row.insertCell(2).textContent=item.calibre
        row.insertCell(3).textContent=item.chassis
        row.insertCell(4).textContent=item.addons
        row.insertCell(5).textContent=item.price
        row.insertCell(6).textContent=item.timeOfOrder
        row.insertCell(7).textContent=item.user_id

        var completeLink = document.createElement("a")
        completeLink.href="completeOrder.php?id="+ item.id
        completeLink.textContent="Complete order"
        var deleteLink = document.createElement("a");
        deleteLink.href = "delete_order.php?id=" + item.id;
        deleteLink.textContent = "Delete";
        var cell = row.insertCell(8);
        cell.appendChild(completeLink);
        cell.appendChild(document.createTextNode(" | "))
        cell.appendChild(deleteLink);
    });

    out.appendChild(table);
}

    

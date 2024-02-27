fetch("getCompletedOrderData.php")
.then(response => {
    if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return response.json();
})
.then(data => {
    displayCompletedOrderData(data);
})
.catch(error => {
    console.error('Fetch error:', error);
});


function displayCompletedOrderData(data){
    var out=document.getElementById("completedOrders");

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
    headerRow.insertCell(7).innerHTML="Time Of Completion";
    headerRow.insertCell(8).innerHTML="User ID"

    data.forEach(function (item){
        var row=table.insertRow(-1);
        row.insertCell(0).textContent=item.id
        row.insertCell(1).textContent=item.hullType
        row.insertCell(2).textContent=item.calibre
        row.insertCell(3).textContent=item.chassis
        row.insertCell(4).textContent=item.addons
        row.insertCell(5).textContent=item.price
        row.insertCell(6).textContent=item.timeOfOrder
        row.insertCell(6).textContent=item.timeOfCompletion
        row.insertCell(8).textContent=item.user_id


    });

    out.appendChild(table);
}
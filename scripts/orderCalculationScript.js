function calculatePrice() {
    var price = {
      "West Hull": 2000,
      "East Hull": 1000,

      "84mm": 1000,
      "105mm": 2000,
      "120mm": 4000,

      "100mm": 900,
      "115mm": 1800,
      "125mm": 2500,

      "Wheeled": 5000,
      "Tracked": 10000,

      "fcs": 5000,
      "smoke": 1000,
      "drone": 3000,
      "comp": 10000,
      "thermal": 5000,
      "era": 10000
    }

    let total = 0;

    var selectedCaliber = document.querySelector("input[name='calibre']:checked");
    
    var selectedHull = document.querySelector("input[name='hullRadio']:checked");
    
    var selectedChassis = document.querySelector("input[name='chassisRadio']:checked");
    
    var selectedOptions = document.querySelectorAll("input[name='bonus[]']:checked");
    
    if (selectedCaliber) {total += price[selectedCaliber.value];}
    
    if (selectedHull) {total += price[selectedHull.value];}
    
    if (selectedChassis){ total += price[selectedChassis.value];}
    
    selectedOptions.forEach(function (option) {

       total += price[option.value];
    });

    document.getElementById("hiddenTotalPrice").value=total;
    document.getElementById("totalPrice").textContent = "Total Price: €" + total;
  }

  function beforeSubmit(event){
    var confirmSubmit = confirm("Do you want to submit the configuration?");

    if(!confirmSubmit){
      event.preventDefault();
    }

    calculatePrice();

    document.getElementById("craftingForm").submit();
  }
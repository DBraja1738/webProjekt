
function showWestCal(){

    let x=document.getElementById("eastCalForm")
    if(!isHidden(x))
    {
        document.getElementById("eastCalForm").style.display="none"
        
    }
    
    document.getElementById('westCalForm').style.display ='block';

}
  function showEastCal(){
    let x=document.getElementById("westCalForm")
    if(!isHidden(x))
    {
        document.getElementById("westCalForm").style.display="none"
    }

    document.getElementById('eastCalForm').style.display ='block';
}

function isHidden(el) {
    return (el.offsetParent === null)
}

function showChassis(){
    document.getElementById("chassis").style.display="block"
    
}

function showAddons(){
    document.getElementById("bonusOptions").style.display="block"
    
}


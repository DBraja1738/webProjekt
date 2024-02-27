(function(window, document, undefined) {

    // code that should be taken care of right away
  
    window.onload = init;
  
    function init(){
        var url=new URL(window.location.href);
        var test=document.getElementById("flag");
        var loginCheck=url.searchParams.get("registerInvalid")

        if(loginCheck){
            test.style.display="block"
        }
    }
  
  })(window, document, undefined);
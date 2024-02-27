fetch('getSessionData.php')
        .then(response => response.json())
        .then(data => {
            if(data.isAuthenticated){
                document.getElementById("begin_button").innerHTML='<i class="bi bi-arrow-return-right"></i>'
                document.getElementById("begin_button").href="crafting.html"
                document.getElementById("login_link").style.display="none";
                document.getElementById("logout").style.display="block";
                document.getElementById("user_greeting").style.display="block";
                document.getElementById("user_greeting").textContent="Hello " + data.username;
                document.getElementById("show_orders").style.display="block"
            }else{
                document.getElementById("login_link").style.display="block";
                document.getElementById("logout").style.display="none"
                document.getElementById("user_greeting").style.display="none"
                document.getElementById("show_orders").style.display="none"
            }  

        })
        .catch(error => console.error('Error:', error));




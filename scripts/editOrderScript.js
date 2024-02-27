fetch('getSessionData.php')
        .then(response => response.json())
        .then(data => {
            
            var url=new URL(window.location.href);
            
            const userID=url.searchParams.get("userID");
            if(userID != data.id){
                window.location.href="index.html"
            }
        })
        .catch(error => console.error('Error:', error));



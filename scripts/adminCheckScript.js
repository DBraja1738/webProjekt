fetch('getSessionData.php')
        .then(response => response.json())
        .then(data => {
            

            // Check the user's role
            if (data.role != 'admin') {
                window.location.href="index.html"
                
            } 
        })
        .catch(error => console.error('Error:', error));
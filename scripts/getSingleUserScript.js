document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get('id');

    if (userId) {
       
        document.getElementById('userId').value = userId;

        fetch(`get_single_user.php?id=${userId}`)
            .then(response => response.json())
            .then(data => {
                
                document.getElementById('userName').value = data.name;
                document.getElementById('userEmail').value = data.email;
                document.getElementById('userPassword').value = data.password;
            })
            .catch(error => console.error('Error:', error));
    } else {
        console.error('User ID not found in the URL.');
    }
});

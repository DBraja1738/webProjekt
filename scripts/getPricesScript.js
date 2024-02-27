fetch("get_prices.php")
.then(response => {
    if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return response.json();
})
.then(data => {
    console.log(data)
})
.catch(error => {
    console.error('Fetch error:', error);
});

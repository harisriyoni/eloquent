
document.addEventListener("DOMContentLoaded", function() {
    const name = "meelad";
    const url = `https://api.agify.io/?name=${name}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            // console.log(data);
            displayData(data);
        })
        .catch(error => console.error('Error:', error));

    function displayData(data) {
        const resultDiv = document.getElementById('result');
        resultDiv.innerHTML = `
            <p>Name: ${data.name}</p>
            <p>Count: ${data.count}</p>
            <p>Age: ${data.age}</p>
        `;
    }
});

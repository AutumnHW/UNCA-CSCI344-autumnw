document.getElementById("q1form").addEventListener("submit", function(event) {
    //Prevent the page from refreshing
    event.preventDefault();
    let temp = parseFloat(document.getElementById("temp").value);
    let unit = document.querySelector('input[name="units"]:checked').value;
    let raining = document.querySelector('input[name="raining"]:checked').value;

    let convertedTemp;
    let convertedUnit;

    if (unit === "F") {
        convertedTemp = ((temp - 32) * 1.8);
        console.log(convertedTemp);
        convertedUnit = "C";
    } else {
        convertedTemp = (temp * 1.8) + 32;
        convertedUnit = "F";
    }
    console.log(unit);
    let jacket;
    if (unit === "F" ? temp < 60 : temp < 15.56) {
        jacket = "You should wear a jacket.";
    } else {
        jacket = "You probably don't need a jacket.";
    }
    
    let umbrella;
    if (raining === "isRaining") {
        umbrella = "You should carry an umbrella.";
    } else {
        umbrella = "You don't need an umbrella.";
    }

    document.getElementById("results").innerHTML = `
        <h3>Weather Recommendations</h3>
        <p>Original Temperature: ${temp}°${unit}</p>
        <p>Converted Temperature: ${convertedTemp.toFixed(2)}°${convertedUnit}</p>
        <p>${jacket}</p>
        <p>${umbrella}</p>
    `;

});
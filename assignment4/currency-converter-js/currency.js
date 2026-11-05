const exchangeRates = {
    USD: 1,
    EUR: 0.92,
    GBP: 0.79,
    JPY: 150.50,
    CAD: 1.36
};

document.getElementById("currencyForm").addEventListener("submit", function(event) {

    event.preventDefault();

    let amount = parseFloat(document.getElementById("amount").value);

    let from = document.getElementById("fromCurrency").value;
    let to = document.getElementById("toCurrency").value;

    let direction = document.querySelector(
        'input[name="direction"]:checked'
    ).value;


    if (direction === "reverse") {
        let temp = from;
        from = to;
        to = temp;
    }
    let convertedAmount = amount / exchangeRates[from];
    convertedAmount = convertedAmount * exchangeRates[to];


    document.getElementById("result").textContent =
        convertedAmount.toFixed(2) + " " + to;

});
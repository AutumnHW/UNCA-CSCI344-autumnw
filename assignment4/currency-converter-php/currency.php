<?php

$exchangeRates = array(
    "USD" => 1.00,
    "EUR" => 0.92,
    "GBP" => 0.79,
    "JPY" => 150.50,
    "CAD" => 1.36
);

//Check that the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Collect form data
    $amount = $_POST["amount"];
    $from = $_POST["fromCurrency"];
    $to = $_POST["toCurrency"];

    //Validate input
    if (!is_numeric($amount) || $amount <= 0 ||
        !isset($exchangeRates[$from]) ||
        !isset($exchangeRates[$to])) {

        die("Invalid amount or currency selection.");

    }

    //Convert the original amount to usd
    $usdAmount = $amount / $exchangeRates[$from];

    //Convert usd to the destination currency
    $convertedAmount = $usdAmount * $exchangeRates[$to];

    //Display output
    echo "<h2>Currency Conversion Result</h2>";

    echo "<p>Original Amount: " .
         htmlspecialchars($amount) . " " .
         htmlspecialchars($from) . "</p>";

    echo "<p>Converted Amount: " .
         number_format($convertedAmount, 2) . " " .
         htmlspecialchars($to) . "</p>";

    echo "<p>Exchange Rate: 1 " .
         htmlspecialchars($from) . " = " .
         number_format(
             $exchangeRates[$to] / $exchangeRates[$from],
             4
         ) . " " .
         htmlspecialchars($to) . "</p>";

    echo '<br><a href="currency.html">Return to Currency Converter</a>';

} else {

    echo "Please submit the currency conversion form.";

}

?>

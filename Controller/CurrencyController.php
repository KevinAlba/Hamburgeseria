<?php

class CurrencyController {

    public function getRate() {
        header("Content-Type: application/json; charset=utf-8");

        $API_KEY = "fca_live_X2mrCw6KkPk0GtVYLmYXMlJYk6BQwVIK16XbBtLh";
        $moneda = $_GET["moneda"] ?? "EUR";

        if ($moneda === "EUR") {
            echo json_encode(["rate" => 1]);
            return;
        }

        $url = "https://api.freecurrencyapi.com/v1/latest?apikey=$API_KEY&base_currency=EUR&currencies=$moneda";
        $response = file_get_contents($url);

        if ($response === false) {
            echo json_encode(["rate" => 1]);
            return;
        }

        $data = json_decode($response, true);

        echo json_encode([
            "rate" => $data["data"][$moneda] ?? 1
        ]);
    }
}
?>
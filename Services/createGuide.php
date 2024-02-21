<?php
    include('../vendor/autoload.php');
    use ElephantIO\Client;
    use ElephantIO\Engine\SocketIO\Version3X;
    
if(isset($_POST)){
    $data=file_get_contents("php://input");
    $req=json_decode($data,true);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api-test.envia.com/ship/generate/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
        "origin": {
            "name": "'.$req["name"].'",
            "company": "oskys factory",
            "email": "'.$req["email"].'",
            "phone": "'.$req["phone"].'",
            "street": "av vasconcelos",
            "number": "1400",
            "district": "mirasierra",
            "city": "Monterrey",
            "state": "NL",
            "country": "MX",
            "postalCode": "66236",
            "reference": ""
        },
        "destination": {
            "name": "oscar",
            "company": "empresa",
            "email": "osgosf8@gmail.com",
            "phone": "8116300800",
            "street": "av vasconcelos",
            "number": "1400",
            "district": "palo blanco",
            "city": "monterrey",
            "state": "NL",
            "country": "MX",
            "postalCode": "66240",
            "reference": ""
        },
        "packages": [
            {
                "content": "playeras",
                "amount": 2,
                "type": "box",
                "dimensions": {
                    "length": 2,
                    "width": 5,
                    "height": 5
                },
                "weight": 63,
                "insurance": 0,
                "declaredValue": 400,
                "weightUnit": "KG",
                "lengthUnit": "CM"
            },
            {
                "content": "'.$req["content"].'",
                "amount": 2,
                "type": "box",
                "dimensions": {
                    "length": 1,
                    "width": 17,
                    "height": 2
                },
                "weight": 5,
                "insurance": 400,
                "declaredValue": 400,
                "weightUnit": "KG",
                "lengthUnit": "CM"
            }
        ],
        "shipment": {
            "carrier": "fedex",
            "service": "express",
            "type": 1
        },
        "settings": {
            "printFormat": "PDF",
            "printSize": "STOCK_4X6",
            "comments": "comentarios de el envío"
        }
    }',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer 6313bfda9cbf9aa7ff160336f437ec76952ec741a2b8c9520f5e0f383e38aa9a'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $client = new Client( new Version3X("http://localhost:3001",[]));
    $client->initialize();
    $client->emit('connection',['test'=>'test']);
    $client->close();
    echo $response;
}else{
    $response = ["mensaje"=>"Faltan datos"];
    echo json_encode($response);
}
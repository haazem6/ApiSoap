
<?php
// Define the WSDL endpoint
$wsdl = 'http://localhost/exemple/server.php?wsdl';

// Define the SOAP client options
$options = array(
    'cache_wsdl' => WSDL_CACHE_NONE,
    'uri' => $wsdl,
    'trace' => 1
);

// Instantiate a new SOAP client
$client = new SoapClient('http://localhost/apiisoap/server.php?wsdl', ['trace' => 1, 'cache_wsdl' => WSDL_CACHE_NONE]);

// Call the "get_data" method
$column = 'user';
$response = $client->getData($column);
$response2 = $client->insertData($column);
// Decode the JSON-encoded response
//$result = json_encode($response);

// Output the result
//var_dump($response);
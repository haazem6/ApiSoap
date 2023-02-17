<?php
ini_set("soap.wsdl_cache_enabled", "0");
function getData($table)
{
    // Connect to the Postgres database
    $host = 'localhost';
    $username = 'postgres';
    $password = 'system';
    $dbname = 'mysoapapi';
    $conn = pg_connect("host=$host dbname=$dbname user=$username password=$password");
    // Build the SQL query
    $query = "SELECT * FROM public.$table";
    // Execute the query
    $result = pg_query($conn, $query);
    // Fetch the results
    $data = pg_fetch_all($result);
    
    //$string=json_encode($result);
    return $data;
}
function insertData($id,$name,$email)
{
    // Connect to the Postgres database
    $host = 'localhost';
    $username = 'postgres';
    $password = 'system';
    $dbname = 'mysoapapi';
    $conn = pg_connect("host=$host dbname=$dbname user=$username password=$password");
    if (!$conn) {
        throw new SoapFault('Server', 'Unable to connect to database');
    }
    // Build the SQL query
    $query = "INSERT INTO public.user (id,name,email) VALUES ($id,$name,$email)";
    // Execute the query
    $result = pg_query($conn, $query);
    // Fetch the result

    
    if ($result) {
        return "saved";
    }
    else
    {
        return  "error insering data" .pg_last_error($conn);
    }

return true;
}
$server = new SoapServer("file.wsdl");
$server->addFunction('getData');
$server->addFunction('insertData');
$server->handle();

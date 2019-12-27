<?php

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}
use \stdClass as stdClass;
use \SoapClient as SoapClient;
require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';

// Creamos la aplicación.
$app = new \Slim\App();



//SECCIÓN DE CÓDIGO PARA PRUEBAS DE CONSUMO SOAP EN SAP


//$client = new SoapClient($url, ['login' => $login, 'password' => $pass, 'exceptions' => true, 'trace' => 1, 'cache_wsdl' => WSDL_CACHE_NONE, 'user_agent' => 'Mi cliente SOAP']);
//var_dump($client->__getFunctions());
//try {
  // $url = "http://gserpsed.sanchez.net:8000/sap/bc/srt/wsdl/flv_10002A111AD1/bndg_url/sap/bc/srt/rfc/sap/zws_service_test/200/ws_test/ws_test?sap-client=200";

  // $login = "test";
  
  // $pass = "12345678";
  
  // //Call the client
  
  // $client = new SoapClient($url, array('login' => $login, 'password' => $pass, 'trace'  => true, 'exceptions' => true,'cache_wsdl' => WSDL_CACHE_NONE));
//}

// catch (SoapFault $e) {

//       echo 'Caught an Error: [' . $e->faultcode . '] – ' . $e->faultstring;

// }


/*
$app->get('/Miguel', function() {
	//echo "SERVICIOS QR";
  //echo '</br><a style="font-family: cursive;">SERVICIOS:</a></p>';
  try {
  //  $url = "http://gserpsed.sanchez.net:8000/sap/bc/srt/wsdl/flv_10002A111AD1/bndg_url/sap/bc/srt/rfc/sap/zws_service_test/200/ws_test/ws_test?sap-client=200";
      //$url = "http://gserpsed.sanchez.net:8000/sap/bc/srt/wsdl/flv_10002A101AD1/bndg_url/sap/bc/srt/rfc/sap/zws_global/200/zws_global/zws_global?sap-client=200";
        $url = "http://gserpsed.sanchez.net:8000/sap/bc/srt/wsdl/flv_10002A101AD1/bndg_url/sap/bc/srt/rfc/sap/ztest_sflight/210/ztest1/ztest_ws?sap-client=210";
     

  $login = "MPEREZ";
  
  $pass = "Mikecorp2311#";
  
  //Call the client
  
  $client = new SoapClient($url, array('login' => $login, 'password' => $pass, 'trace'  => true, 'exceptions' => true,'soap_version'  => SOAP_1_2));
  //$array_respuesta = $client->ZWS_PRUEBA(["I_NUM1" => 2.00, "I_NUM2" => 5.00, "I_OPER" => "+"]);
  //echo $array_respuesta->ZTY_SFLIGHT;
  //$Respuesta = json_decode($array_respuesta->ZWS_PRUEBAResponse);
  //$air = 'AA';
  $flight = $client->Z_SFLIGHT_LIST();
   $value = get_object_vars($flight);
   $arrayName = (array)$value;
   
  //$arrayf = array_map('Z_SFLIGHT_LISTResponse', $value);
  //$values_array = json_decode(json_encode((array)simplexml_load_string($value)),1);
    foreach ($arrayName as $arr) {
    print_r( $arr->CARRID);
  //   //echo $arr[‘TSflight’][‘item’][‘0’][‘Fldate’];
   }



}

catch (SoapFault $e) {

      echo 'Caught an Error: [' . $e->faultcode . '] – ' . $e->faultstring;

}

});

*/

//----------------
// $app->get('/', function() {
// 	//echo "SERVICIOS QR";
//   //echo '</br><a style="font-family: cursive;">SERVICIOS:</a></p>';
//   try {
//   //  $url = "http://gserpsed.sanchez.net:8000/sap/bc/srt/wsdl/flv_10002A111AD1/bndg_url/sap/bc/srt/rfc/sap/zws_service_test/200/ws_test/ws_test?sap-client=200";
//       //$url = "http://gserpsed.sanchez.net:8000/sap/bc/srt/wsdl/flv_10002A101AD1/bndg_url/sap/bc/srt/rfc/sap/zws_global/200/zws_global/zws_global?sap-client=200";
//         $url = "http://gserpsed.sanchez.net:8000/sap/bc/srt/wsdl/flv_10002A101AD1/bndg_url/sap/bc/srt/rfc/sap/ztest_sflight/210/ztest1/ztest_ws?sap-client=210";
     

//   $login = "MPEREZ";
  
//   $pass = "Mikecorp2311#";
  
//   //Call the client
  
//   $client = new SoapClient($url, array('login' => $login, 'password' => $pass, 'trace'  => true, 'exceptions' => true,'soap_version'  => SOAP_1_2));
//   $array_respuesta = $client->Z_SFLIGHT_LIST();
//   //$xx=$array_respuesta->ZTY_SFLIGHT['0']['Carrid'];
//   //$Respuesta = json_decode($array_respuesta->Z_SFLIGHT_LISTResponse);
//   $value=$array_respuesta->Z_SFLIGHT_LISTResponse;
//   $values_array = json_decode(json_encode((array)simplexml_load_string($values)),1);
//   //$xx->Carrid;
//   //$air = 'AA';
//   //$flight = $client->Z_SFLIGHT_LIST();
//   //$value = get_object_vars($flight);
//   //$arrayf = array_map('objectToArray', $value);

//   // foreach ($arrayf['ZT_SFLIGHT']['item'] as $arr) {
//   //   //echo $arr['Carrid'];
//   //   //echo $arr[‘TSflight’][‘item’][‘0’][‘Fldate’];
//   // }

  

// }

// catch (SoapFault $e) {

//       echo 'Caught an Error: [' . $e->faultcode . '] – ' . $e->faultstring;

// }

// });

// FIN DE SECCIÓN DE CÓDIGO PARA PRUEBAS DE CONSUMO SOAP EN SAP


// Run app
$app->run();

<?php
/**
 *
 * @About:      API Interface
 * @File:       index.php
 * @Date:       $Date:$ Nov-2015
 * @Version:    $Rev:$ 1.0
 * @Developer:  Federico Guzman (federicoguzman@gmail.com)
 **/

/* Los headers permiten acceso desde otro dominio (CORS) a nuestro REST API o desde un cliente remoto via HTTP
 * Removiendo las lineas header() limitamos el acceso a nuestro RESTfull API a el mismo dominio
 * Nótese los métodos permitidos en Access-Control-Allow-Methods. Esto nos permite limitar los métodos de consulta a nuestro RESTfull API
 * Mas información: https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS
 **/
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: text/html; charset=utf-8');
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"'); 

include_once '../controller/UserController.php';
include_once '../controller/ApartamentController.php';

/* Puedes utilizar este file para conectar con base de datos incluido en este demo; 
 * si lo usas debes eliminar el include_once del file Config ya que le mismo está incluido en DBHandler 
 **/
//require_once '../include/DbHandler.php'; 
define('API_KEY','3d524a53c110e4c22463b10ed32cef9d');

require '../libs/Slim/Slim.php'; 
\Slim\Slim::registerAutoloader(); 
$app = new \Slim\Slim();


/* Usando GET para consultar los autos */

$app->get('/getUsers', function() {
    
    $userController = new UserController();
    $respuesta = $userController -> get_all_user();
    //$db = new DbHandler();

    /* Array de autos para ejemplo response
     * Puesdes usar el resultado de un query a la base de datos mediante un metodo en DBHandler
     **/
   /* $autos = array( 
                    array('make'=>'Toyota', 'model'=>'Corolla', 'year'=>'2006', 'MSRP'=>'18,000'),
                    array('make'=>'Nissan', 'model'=>'Sentra', 'year'=>'2010', 'MSRP'=>'22,000')
            );
    */
    $response["error"] = false;
    $response["message"] = "Usuarios cargados: " . count($respuesta); //podemos usar count() para conocer el total de valores de un array
    $response["usuarios"] = $respuesta;


    echoResponse(200, $response);
});
/*Metodo para otener las provincias*/
$app->get('/getprovince', function() {
    
    $ApartamentController = new ApartamentController();
    $respuesta = $ApartamentController -> get_all_Province();
    
    
    echoResponse(200, $respuesta);
});
/*Metodo para otener los cantones*/
$app->get('/getcanton', function() {
    
    $ApartamentController = new ApartamentController();
    $respuesta = $ApartamentController -> get_all_Canton();
    
    echoResponse(200, $respuesta);
});
$app->get('/getdistric', function() {
    
    $ApartamentController = new ApartamentController();
    $respuesta = $ApartamentController -> get_all_Distric();
    
    echoResponse(200, $respuesta);
});

/* Usando POST para crear un auto */
$app->post('/login', 'authenticate', function() use ($app) {
    // check for required params
    //verifyRequiredParams(array('make', 'model', 'year', 'msrp'));
    $userController = new UserController();
    //echo "$app";
    $datosSolicitud = json_decode(file_get_contents("php://input"));
    $respuesta = $userController -> login($datosSolicitud->email, $datosSolicitud->password);
    /* Podemos inicializar la conexion a la base de datos si queremos hacer uso de esta para procesar los parametros con DB */
    //$db = new DbHandler();

    /* Podemos crear un metodo que almacene el nuevo auto, por ejemplo: 
    //$auto = $db->createAuto($param);*/
    if(count($respuesta) == 1){
        $response["error"] = false;
        $response["message"] = "login";
        $response["user"] = $respuesta;

        echoResponse(201, $response);
    }else{
        $response["error"] = true;
        $response["message"] = "no existe";
        $response["user"] = null;

        echoResponse(201, $response);
    }
    
});
/* Usando POST para crear un auto */
$app->post('/crearapartamento', function() use ($app) {
    // check for required params
    //verifyRequiredParams(array('make', 'model', 'year', 'msrp'));
    $ApartamentController = new ApartamentController();
    //echo "$app";
    $datosSolicitud = json_decode(file_get_contents("php://input"));
   $respuesta = $ApartamentController -> insert_apartament($datosSolicitud->capacity, $datosSolicitud->lessee_id,$datosSolicitud->status_id,
        $datosSolicitud->district_id,$datosSolicitud->is_active,$datosSolicitud->price,$datosSolicitud->name,
        $datosSolicitud->description,$datosSolicitud->adress,$datosSolicitud->Image);
    /* Podemos inicializar la conexion a la base de datos si queremos hacer uso de esta para procesar los parametros con DB */
    //$db = new DbHandler();
    /* Podemos crear un metodo que almacene el nuevo auto, por ejemplo: 
    //$auto = $db->createAuto($param);*/
   
        echoResponse(201, $respuesta);
});

/* corremos la aplicación */
$app->run();

/*********************** USEFULL FUNCTIONS **************************************/

/**
 * Verificando los parametros requeridos en el metodo o endpoint
 */
function verifyRequiredParams($required_fields) {
    $error = false;
    $error_fields = "";
    $request_params = array();
    $request_params = $_REQUEST;
    // Handling PUT request params
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $app = \Slim\Slim::getInstance();
        parse_str($app->request()->getBody(), $request_params);
    }
    foreach ($required_fields as $field) {
        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
            $error = true;
            $error_fields .= $field . ', ';
        }
    }
 
    if ($error) {
        // Required field(s) are missing or empty
        // echo error json and stop the app
        $response = array();
        $app = \Slim\Slim::getInstance();
        $response["error"] = true;
        $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
        echoResponse(400, $response);
        
        $app->stop();
    }
}
 
/**
 * Validando parametro email si necesario; un Extra ;)
 */
function validateEmail($email) {
    $app = \Slim\Slim::getInstance();
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response["error"] = true;
        $response["message"] = 'Email address is not valid';
        echoResponse(400, $response);
        
        $app->stop();
    }
}
 
/**
 * Mostrando la respuesta en formato json al cliente o navegador
 * @param String $status_code Http response code
 * @param Int $response Json response
 */
function echoResponse($status_code, $response) {
    $app = \Slim\Slim::getInstance();
    // Http response code
    $app->status($status_code);
 
    // setting response content type to json
    $app->contentType('application/json');
 
    echo json_encode($response);
}

/**
 * Agregando un leyer intermedio e autenticación para uno o todos los metodos, usar segun necesidad
 * Revisa si la consulta contiene un Header "Authorization" para validar
 */
function authenticate(\Slim\Route $route) {
    // Getting request headers
    $headers = apache_request_headers();
    $response = array();
    $app = \Slim\Slim::getInstance();
 
    // Verifying Authorization Header
    if (isset($headers['Authorization'])) {
        //$db = new DbHandler(); //utilizar para manejar autenticacion contra base de datos
 
        // get the api key
        $token = $headers['Authorization'];
        
        // validating api key
        if (!($token == API_KEY)) { //API_KEY declarada en Config.php
            
            // api key is not present in users table
            $response["error"] = true;
            $response["message"] = "Acceso denegado. Token inválido";
            echoResponse(401, $response);
            
            $app->stop(); //Detenemos la ejecución del programa al no validar
            
        } else {
            //procede utilizar el recurso o metodo del llamado
        }
    } else {
        // api key is missing in header
        $response["error"] = true;
        $response["message"] = "Falta token de autorización";
        echoResponse(400, $response);
        
        $app->stop();
    }
}
?>
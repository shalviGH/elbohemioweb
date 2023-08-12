
<?php 


/*require 'vendor/autoload.php';
$token = "GA230722232856";
$client = new GuzzleHttp\Client(['verify' => false ]);
$payload = array(
            "op" => "registermessage",
            "token_qr" => $token,
            "mensajes" => array(
                array("numero" => "9191321935", "mensaje" => "prueba desde php su pedido se ha realizado con exito"),
                array("numero" => "9621082856", "mensaje" => "prueba desde php su pedido se ha realizado conexito"),
            )
            
);

$res = $client->request('POST', 'https://script.google.com/macros/s/AKfycbyoBhxuklU5D3LTguTcYAS85klwFINHxxd-FroauC4CmFVvS0ua/exec', [

    'headers' => [

        'Content-Type'     => 'application/json',

        'Accept' => 'application/json'

    ], 'json' =>  $payload

]);

echo $res->getStatusCode()."<br>";

echo $res->getBody();*/
//Escaneo OK , su TOKEN WHATSAPP ES : GA230722232856 , NUMERO CELULAR ES : 5219191321935

   /* ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(-1);

    require 'vendor/autoload.php';
    use \Axiom\Rivescript\Rivescript;



        $token = 'HolaNovato';
        $palabraReto = $_GET['hub_challenge'];
        $tokenVerification = $_GET['hub_verify_token'];

        if($token == $tokenVerification){
            echo $palabraReto;
            exit;
        }


        $respuesta = file_get_contents("php://input");
        $respuesta = json_decode($respuesta, true);
        //$mensaje = $respuesta['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'];
        $mensaje = $respuesta['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'];
        $telefonoCliente = $respuesta['entry'][0]['changes'][0]['value']['messages'][0]['from'];
        $id= $respuesta['entry'][0]['changes'][0]['value']['messages'][0]['id'];
        $timestamp= $respuesta['entry'][0]['changes'][0]['value']['messages'][0]['timestamp'];

        if($mensaje!=null){
            //file_put_contents("text.txt", $mensaje);

            $rivescript= new Rivescript();
            $rivescript->load('restaurante.rive');
            //obtenemos la respuesta
            $respuesta = $rivescript->reply($mensaje);
            //escribimos la respuesta
            //file_put_contents("text.txt", $respuesta);

            require_once "envia.php";
            enviar($mensaje,$respuesta,$id,$timestamp,$telefonoCliente);

        }*/







        ####################################################################3
        #######################################################################
        #########################################################################
        ############################################################################
        ###########################################################################

        
      /*  //TOKEN QUE NOS DA FACEBOOK
        $token = 'EAANYZBqQ5IpMBO3ueQBKZBnl0Bsq88Vb4xKABGXClGz51eZC1BAqfdzBRpeYf0QRO3CeGNfjBadxtHcwcIDy9bvA8cqIORSAeFbJPSu29cqqMLVQLKgRlLQSb2R3t2UX0iQWGTAAoyq4l5fVgS4f15OI23d7G7ZA9c0XSEfBicvQ9ModaFJZCQpt09MnqRRukgLw9uKrTnklBZAB3FzJcZD';
        //NUESTRO TELEFONO
        $telefono = '529191321935';
        //URL A DONDE SE MANDARA EL MENSAJE
        $url = 'https://graph.facebook.com/v17.0/103159939532648/messages';

        //CONFIGURACION DEL MENSAJE
        $mensaje = ''
                . '{'
                . '"messaging_product": "whatsapp", '
                . '"to": "'.$telefono.'", '
                . '"type": "template", '
                . '"template": '
                . '{'
                . '     "name": "hello_world",'
                . '     "language":{ "code": "en_US" } '
                . '} '
                . '}';
        //DECLARAMOS LAS CABECERAS
        $header = array("Authorization: Bearer " . $token, "Content-Type: application/json",);
        //INICIAMOS EL CURL
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //OBTENEMOS LA RESPUESTA DEL ENVIO DE INFORMACION
        $response = json_decode(curl_exec($curl), true);
        //IMPRIMIMOS LA RESPUESTA 
        print_r($response);
        //OBTENEMOS EL CODIGO DE LA RESPUESTA
        $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        //CERRAMOS EL CURL
        curl_close($curl);
        */
        #########################################################################
        #########################################################################
        #########################################################################
        #########################################################################
        #########################################################################
        #########################################################################
        
       


       
    
   
    require('Views/home.php')


?>
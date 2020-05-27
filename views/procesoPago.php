<!DOCTYPE html>
<html>
<head>
	<title>Proceso de pago</title>
</head>
<body>
	<div>
		<h1>Resultado de Pago</h1>

		<?php

			if (isset($_REQUEST["token"])) {
				
			  $token = $_REQUEST["token"];
			  $payment_method_id = $_REQUEST["payment_method_id"];
			  $installments = $_REQUEST["installments"];
			  $issuer_id = $_REQUEST["issuer_id"];


			   require_once 'vendor/autoload.php';

			    MercadoPago\SDK::setAccessToken("TEST-5814867068644665-031919-a76cea150125ff1af9086ad8faaae298-68941930");
			    //...
			    $payment = new MercadoPago\Payment();
			    $payment->transaction_amount = 350;
			    $payment->token = $token;
			    $payment->description = "Sleek Marble Watch";
			    $payment->installments = $installments;
			    $payment->payment_method_id = $payment_method_id;
			    $payment->issuer_id = $issuer_id;
			    $payment->payer = array(
			    "email" => "cgl_8791@hotmail.com"
			    );
			    // Guarda y postea el pago
			    $payment->save();
			    echo '<pre>'; print_r($payment); echo '</pre>';
			    //...
			    // Imprime el estado del pago

			    echo $payment->status;

			    if ($payment->status == "approved"){
			    	 	
			    }

			}
		?>
	</div>

</body>
</html>
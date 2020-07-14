<?php 

include("db_connect.php") ;
$nom=trim($_POST['name']);
$pnom=trim($_POST['lastname']);
$mail=trim($_POST['email']);
$message=trim($_POST['message']);

if($nom!="" and $pnom!="" and $mail !="" and $message!="" ){
$req = $bdd->prepare("INSERT INTO ciga_message (nom, pnom,email, message, datee) 
							VALUES (:name,:pnom,:mail, :message, NOW()) ");
		$req->execute(array(
		"name" => $nom,
	
        "pnom" =>$pnom,
        "mail" =>$mail,
        "message" =>$message,
		));
		header("location=index.html");

}
else{
header("location=contact-us.html");
}

?>
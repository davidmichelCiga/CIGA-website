<?php 
include("db_connect.php") ;
$mail=trim($_POST['EMAIL']);
	
$req = $bdd->prepare('SELECT count(*) as nbr FROM ciga_user  WHERE email = :email');
$req->execute(array(
'email' => $_POST['EMAIL'] ));
$do = $req->fetch();


if( $mail !="" and $do['nbr']<1)
    {
        $req = $bdd->prepare("INSERT INTO ciga_user (email, dateinsc) 
							VALUES (:mail, NOW()) ");
		$req->execute(array(
	
        "mail" =>$mail,
        ));
        header("location=index.html");
     }
else{
echo "l'adresse dejà utilisée, réessayez avec une autre !";
}

?>
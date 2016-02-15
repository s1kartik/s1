<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Safety 1</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.s1content_body_title{
	font:12pt, Arial !important;
	font-weight:bold !important;
	margin-top:5px !important;
}
</style>
</head>
<body style="font-family:helvetica, arial, sans-serif; font-weight:100; margin:0; padding:0; background-image:url(<?php echo $base;?>img/dark_wall.png); ">

<div style="padding:20px;" >
	<div style="padding: 10px; text-align:left"><img src="<?php echo $base;?>img/logo.png" /><img  src="<?php echo $base;?>img/slogan.png"/></div>
	<div style="padding:10px;background-color:#fff;" >
		<h3 style="color:#ed1d24;font-weight:bold;">One member sent a message from www.mys1s.ca website.</h3>
		<p style="font:12pt, Arial;color:black;font-weight:bold;">From: <?php echo isset($email_from) ? $email_from : '';?></p>
		<p style="font:12pt, Arial;color:black;font-weight:bold;">Reason: <?php echo isset($email_reason) ? $email_reason : '';?></p>
		<p style="font:12pt, Arial;color:black;font-weight:bold;">Subject: <?php echo isset($email_subject) ? $email_subject : '';?></p>
		<p style="font:12pt, Arial;color:black;"><?php echo $email_body;?></p>
		<p style="text-align:right;">
		<a href="http://www.mys1s.ca" style="text-decoration:none;">
		<button title="Safety 1" style="background-color:red;font-weight:bold;color:white;padding:0px;border:0px;height:30px;width:50px;font-size:15px;">Go!</button>
		</a>
		</p>
	</div>
	<p style="font-size:10px; font-weight:normal; margin-top:50px;color:#fff;">This e-mail (and attachment(s)) is confidential, proprietary, may be subject to copyright and legal privilege and no related rights are waived. If you are not the intended recipient or its agent, any review, dissemination, distribution or copying of this e-mail or any of its content is strictly prohibited and may be unlawful. All messages may be monitored as permitted by applicable law and regulations and our policies to protect our business. E-mails are not secure and you are deemed to have accepted any risk if you communicate with us by e-mail. If received in error, please notify us immediately and delete the e-mail (and any attachments) from any computer or any storage medium without printing a copy.</p>
	<p style="font-size:10px; font-weight:normal;color:#fff;">Ce courriel (ainsi que ses pièces jointes) est confidentiel, exclusif, et peut faire l’objet de droit d’auteur et de privilège juridique; aucun droit connexe n’est exclu. Si vous n’êtes pas le destinataire visé ou son représentant, toute étude, diffusion, transmission ou copie de ce courriel en tout ou en partie, est strictement interdite et peut être illégale. Tous les messages peuvent être surveillés, selon les lois et règlements applicables et les politiques de protection de notre entreprise. Les courriels ne sont pas sécurisés et vous êtes réputés avoir accepté tous les risques qui y sont liés si vous choisissez de communiquer avec nous par ce moyen. Si vous avez reçu ce message par erreur, veuillez nous en aviser immédiatement et supprimer ce courriel (ainsi que toutes ses pièces jointes) de tout ordinateur ou support de données sans en imprimer une copie.</p>
</div>
</body>
</html>
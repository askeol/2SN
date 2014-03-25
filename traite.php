<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<meta charset="UTF-8">
<title>2SN</title>
</head>
<SCRIPT language="javascript">
   function ValiderMail(formulaire) {
      if (formulaire.mail.value.indexOf("@",0)<0) {alert("Adresse mail saisie invalide.\n")}
     else if (formulaire.pseudo.value == "") {alert("Pseudo saisi invalide.\n")}
	  else if (formulaire.pass.value == "") {alert("Mot de passe saisi invalide.\n")}
	  	  else if (formulaire.conditions.value != true) {alert("Tu dois accepter les conditions.\n")}
	 else if (formulaire.pass.value == formulaire.pass1.value) {formulaire.submit()}
	 
	  else { alert("Mot de passe de confirmation invalide.\n")}
   }
</SCRIPT>
<div id="final">
<center><font size="15">Rejoins 2SN aujourd'hui !</font></center></br></br>
<form id="signup" name="monform" method="post" action="traite.php">
    <input type="email" placeholder="john.doe@email.com" name="mail" value="<?php echo $_POST['mail'] ?>" required></br></br>
    <input type="text" placeholder="Choisis ton pseudo !" name="pseudo" value="<?php echo $_POST['pseudo'] ?>"required></br></br>           
    <input type="password" placeholder="Choisis ton mot de passe !" name="pass" value="<?php echo $_POST['pass'] ?>" required></br></br>
      <input type="password" placeholder="Confirme ton mot de passe !" name="pass1" required></br></br>
<input type="checkbox" name="conditions" value="true" checked="checked" /> J'accepte les conditions.
    <button type="button" onClick="ValiderMail(this.form)">Creer mon compte</button>    
</form>
</div>
<body>
</body>
</html>
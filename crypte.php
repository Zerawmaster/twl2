<?php require 'functions.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="title" content="TWL2" />
<meta name="author" content="Zeraw" />
<meta name="owner" content="zerawmaster@gmail.com" />
<meta name="subject" content="Cryptage et Décryptage du TWL2" />
<meta name="rating" content="Informatique" />
<meta name="description" content="Décrypter et crypter en TWL2 grâce à ce site extrêment rapide ! Améliorez votre expérience utilisateur en utilisant le raccourci intelligent !" />
<meta name="abstract" content="Décrypter et crypter en TWL2 grâce à ce site extrêment rapide ! Améliorez votre expérience utilisateur en utilisant le raccourci intelligent ! Thiweb Live en ligne, en mieux !" />
<meta name="keywords" content="twl2, thiweb, thiweblive, twl, zeraw, zerawmaster, cryptage, decryptage, bookmarklet" />
<meta name="revisit-after" content="20 DAYS" />
<meta name="language" content="FR" />
<meta name="robots" content="No Follow" />
<link rel="icon" type="image/ico" href="favicon.png" />
<title>TWL2</title>
<script src="accordion.js" type="text/javascript"></script>
<script src="scripts.js" type="text/javascript"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="corps">
  <div id="titre"><a href="index.php"><img src="images/titre.png" alt="TWL2" width="136" height="25" /></a></div>
  <div id="Accordion" class="Accordion">
    <div class="AccordionPanel">
      <div class="AccordionPanelTab">R&eacute;sultat du cryptage</div>
      <div class="AccordionPanelContent">
        <p>
          <textarea name="resultat" id="resultat" cols="70" rows="5"><?php echo isset($_POST['clair']) ? code($_POST['clair']) : "Aucune donnée n'a pu être cryptée"; ?></textarea>
          <br />
          <input value="S&eacute;lectionner" type="button" onclick="selectResultat();" />
        </p>
      </div>
    </div>
    <div class="AccordionPanel">
      <div class="AccordionPanelTab">D&eacute;crypter</div>
      <div class="AccordionPanelContent">
        <form action="decrypte.php" method="post">
          <p>
            <textarea name="crypte" cols="70" rows="5"></textarea>
            <br />
            <input type="reset" value="Effacer" />
            <input type="submit" value="D&eacute;crypter" />
          </p>
        </form>
      </div>
    </div>
    <div class="AccordionPanel">
      <div class="AccordionPanelTab">Crypter</div>
      <div class="AccordionPanelContent">
        <form action="crypte.php" method="post">
          <p>
            <textarea name="clair" cols="70" rows="5"></textarea>
            <br />
            <input type="reset" value="Effacer" />
            <input type="submit" value="Crypter" />
          </p>
        </form>
      </div>
    </div>
  </div>
  <div id="compteur">
    <?php echo 'Nombre d\'utilisations : '.incrementUsageCounter(); ?>
  </div>
</div>
<div id="button"><a href="http://live.thiweb.com/"><img src="images/button_redna.png" alt="Redna Project" /></a><a href="http://forum.thiweb.com/"><img src="images/button_thiweb.png" alt="For Thiweb" width="80" height="15" /></a><a href="http://twl2.fr.nf/"><img src="images/button_zeraw.png" alt="By Zeraw" width="80" height="15" /></a><a href="http://validator.w3.org/check?uri=referer"><img src="images/button_valid.png" alt="Valid XHTML 1.1" /></a></div>
<script type="text/javascript">
<!--
var Accordion = new Spry.Widget.Accordion("Accordion");
//-->
</script>
</body>
</html>

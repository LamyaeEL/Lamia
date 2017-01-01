<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Hello</title>
		<meta charset="utf-8"/>
		<meta name="description" content ="Description de la page"/>
		<meta name="viewport"
			content="width=device-width, initial-scale=1, user-scalable=no"/>
			<link rel="stylesheet" href="css/style.css"/>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/jquery.fancybox.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">
	</head>
	<body>
		<!-- degradé-->
		<div id="gradient"></div>
		<!-- Navigation -->
		<!-- Nav est un sysonyme 
			semantique de div -->
		<nav id="main-nav">

			<ul class="content-width">
				<li class="active"><a href="#">Accueil</a></li>
				<li><a href="#">Services</a>
					<ul>
						<li><a href="">Service 1</a></li>
						<li><a href="">Service 2</a></li>
						<li><a href="">Service 3</a></li>
					</ul>
				</li>
				<li><a href="#">Contacts</a></li>

			</ul>
		</nav>
		<div id="menu-space"></div>
		<!-- Contenu principal -->
		<section id="main" class="content-width"> 

			<header class="col-12"> <h1> Veuillez saisir votre code postal</h1>
			</header>
			
			
			<!-- Separateur annule le float -->
			<div class="clear"></div>
			<div class="bg-red top-left"></div>	
			

			<section id="service">
				<div class="container">
					
					
						<div class="sec-title text-center" >
							<h2 class="wow animated bounceInLeft">Code postal</h2>
							
						</div>
						
						<div >
							<form action="resultat.php" method="post">
								<div id="recherche">
									<input id="input" type="text" name="codepostal" class="form-control" placeholder="Votre code postal">
								</div>
								
								
						<button type="submit" id="button-recherche" >Ville correspondante au code postal</button>
						</div>
							</form>
						</div>
						
						
						<div id="ville" class="sec-title text-center">
							
							 
							
											             <!--Le code PHP-->
 <?php
try
{
    //On se connecte à Mysql
     $bdd = new PDO('mysql:host=sql304.hebergratuit.net;dbname=heber_19388446_lamia;charset=utf8', 'heber_19388446', '3Y01Kfmb8g');
}
catch (Exception $e)
{
    //En cas d'erreur, on affiche un message
    die('Erreur : ' . $e->getMessage());
}
//Si tout va bien, on continue
$ville_code_postal=$_POST['codepostal'];   //On recupere la valeur de la variable ville_code_postal et on la stocke dans la variable $ville_code_postal

$reponse=$bdd->query("SELECT * FROM villes_france_free WHERE ville_code_postal='$ville_code_postal'" ); //On selectionne toutes les colonnes de la table villes_france_free dont le code postal est le même que la valeur entrée par l'utilisateur
// On affiche chaque entrée une à une
if(mysql_error())  //On cas d'erreur
        { /* Erreur dans la base de donnees */
           print "Erreur dans la base de données : ".mysql_error();
           print "<br> Stop !!!";
           exit();
        }
       else
	   {
	   
	  $donnees = $reponse->fetch();  
	  
	   
		     if($ville_code_postal==$donnees['ville_code_postal']) { //On verifie si le code postal existe dans la base de données
			  
			 
			    echo "Ville :   "   .$donnees["ville_nom_reel"];  // Si tout va bien on affiche le nom de la ville correspondante
			}
			
			else {
			
			   echo "Pas de ville correpondante"; // Sinon, on affiche un message d'erreur 
			
			
			}
			}
	 // Termine le traitement de la requête
		  $reponse->closeCursor();
?>

							
						
						</div>
						
					
					
					
					
			</section>

			
		</section>
		
		

		<footer>
			<div class="content-width">
				<ul>
				<li class="active">
				<a href="#">Accueil</a></li>
				<li><a href="#">Services</a></li>
				<li><a href="#">Contacts</a></li>
			</ul>
			</div>
		</footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		

	</body>
</html>

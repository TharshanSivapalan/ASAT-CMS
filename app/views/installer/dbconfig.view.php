<?php
	if(isset($result) && $result === true){
?>
	<script>
		$(document).ready(function(){
			$("form#database-form").attr('action', '/installer/siteconfig');
			$('form#database-form input').each(function(){
				if($(this).attr('type') == 'text'){
			    	$(this).attr('readonly', 'readonly');
				}
			});
			$('form#database-form input.button').css('background-color', '#80f718');
			$('form#database-form input.button').focus();
		});
	</script>
<?php
	}
?>

<div class="content">
	<div class="completed">Bienvenue</div>
	<div class="current">Base de données</div>
	<div>Configuration du site</div>
</div>
<div class="settings" id="db-settings">
	<h3>Configuration de la base de données</h3>
	<p>
		<span>Pour utiliser ASAT-CMS, vous devez créer une base de données pour répertorier toutes les activités de votre ou vos restaurant(s).</span>
	</p>
	<p>
		<span>Veuillez compléter les champs ci-dessous pour que ASAT-CMS se connecte à votre base de données.</span>
	</p>
	<form id="database-form" method="post" action="">
		<table>
			<tr>
				<td>Adresse de la base de données</td>
					<?php
						if(!empty($_POST)){
							echo "<td><input type='text' name='database_address' value='".$_POST['database_address']."' required='required'></td>";
						}else{
							echo "<td><input type='text' name='database_address' value='localhost' required='required'></td>";
						}

						if(isset($errors) && $errors['code'] == "no_database"){
							echo "<td>Vérifiez si à l'adresse indiqué précédemment se trouve une base de données MySQL</td>";
						}
					?>
			</tr>
			<tr>
				<td>Port de la base de données</td>
					<?php
						if(!empty($_POST)){
							echo "<td><input type='text' name='database_port' value='".$_POST['database_port']."' required='required'></td>";
						}else{
							echo "<td><input type='text' name='database_port' value='3306' required='required'></td>";
						}
						if(isset($errors) && $errors['code'] == "no_database"){
							echo "<td>Vérifiez le port utilisé par MySQL</td>";
						}
					?>
			</tr>
			<tr>
				<td>Nom de la base de données</td>
					<?php
						if(!empty($_POST)){
							echo "<td><input type='text' name='database_name' value='".$_POST['database_name']."' required='required'></td>";
						}else{
							echo "<td><input type='text' name='database_name' value='asat' required='required'></td>";
						}
						if(isset($errors) && $errors['code'] == 1049){
							echo "<td>Il n' y a pas de base de données comportant ce nom</td>";
						}
					?>
			</tr>
			<tr>
				<td>Identifiant MySQL</td>
					<?php
						if(!empty($_POST)){
							echo "<td><input type='text' name='database_login' value='".$_POST['database_login']."' required='required'></td>";
						}else{
							echo "<td><input type='text' name='database_login' placeholder='utilisateur' required='required'></td>";
						}
						if(isset($errors) && $errors['code'] == 1045){
							echo "<td>Erreur lors de la connexion à la base de données. <br/> Vérifiez l'identifiant et le mot de passe</td>";
						}
					?>		
			</tr>
			<tr>
				<td>Mot de passe de base de données</td>
					<?php
						if(!empty($_POST['database_password'])){
							echo "<td><input type='text' name='database_password' value='".$_POST['database_password']."' ></td>";
						}else{
							echo "<td><input type='text' name='database_password' placeholder='mot de passe' ></td>";
						}
					?>
			</tr>
			<tr>
				<td><input type="submit" class="button" value="Suivant" >
				<td></td>
			</tr>
		</table>
	</form>
</div>
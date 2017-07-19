<div class="content">
	<div class="completed">Bienvenue</div>
	<div class="completed">Base de données</div>
	<div class="current">Configuration du site</div>
</div>
<div class="settings" id="configuration">
	<h3>Quelques informations nécessaire...</h3>
	<p>
		<span>Vous n’avez qu’à remplir les informations demandées ci-dessous et vous serez prêt à utiliser la plateforme de publication de contenu la plus utilisée au monde par les restaurateurs.</span>
	</p>
	<form id="site-configuration-form" method="post" action="">
		<table>
			<tr>
				<td>Titre du site</td>
					<?php
						if(isset($_POST['website_name'])){
							echo "<td><input type='text' name='website_name' value='".$_POST['website_name']."' required='required'></td>";
						}else{
							echo "<td><input type='text' name='website_name' placeholder='Ex: E-Tacos' required='required'></td>";
						}
					?>
			</tr>
			<tr>
				<td>Identifiant administrateur</td>
					<?php
						if(isset($_POST['admin_login'])){
							echo "<td><input type='text' name='admin_login' value='".$_POST['admin_login']."' required='required'></td>";
						}else{
							echo "<td><input type='text' name='admin_login' value='admin' required='required'></td>";
						}
					?>
			</tr>
			<tr>
				<td>Mot de passe</td>
					<td><input type='password' name='admin_password' placeholder='Your password' required='required' minlength="8" maxlength="16"></td>
			</tr>
			<tr>
				<td>Email de l'administrateur</td>
					<?php
						if(isset($_POST['admin_email'])){
							echo "<td><input type='text' name='admin_email' value='".$_POST['admin_email']."' required='required'></td>";
						}else{
							echo "<td><input type='text' name='admin_email' placeholder='admin@domain.com' required='required'></td>";
						}
					?>
			</tr>
			<tr>
				<td>Paramétrer les configurations d'email ?</td>
				<td><input type="checkbox" id="setup-email"></td>
			</tr>
			<tr class="email-configuration">
				<td>Adresse du serveur Mail</td>
					<?php
						if(isset($_POST['email_host'])){
							echo "<td><input type='text' name='email_host' value='".$_POST['email_host']."' ></td>";								
						}else{
							echo "<td><input type='text' name='email_host' placeholder='smtp.domain.com' ></td>";
						}
					?>
			</tr>
			<tr class="email-configuration">
				<td>Adresse email</td>
					<?php
						if(isset($_POST['email_address'])){
							echo "<td><input type='text' name='email_address' value='".$_POST['email_address']."' ></td>";
						}else{
							echo "<td><input type='text' name='email_address' placeholder='automessage@domain.com' ></td>";
						}
					?>
			</tr>
			<tr class="email-configuration">
				<td>Mot de passe</td>
				<td><input type="password" name="email_password" placeholder="Mot de passe"></td>
			</tr>
			<tr class="email-configuration">
				<td>Port</td>
				<td><input type="text" name="email_port" placeholder="587"></td>
			</tr>
			<tr id='submit-button'>
				<td><input type="submit" class="button" value="Terminer" >
				<td></td>
			</tr>
		</table>
	</form>
</div>

<script>
	$('#setup-email').click(function(){
		if($(this).is(':checked')){
			$('.email-configuration').fadeIn('slow');
		}else{
			$('.email-configuration').hide();
		}
	});
</script>
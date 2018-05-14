<?php
include_once 'php/core/config.php';
include_once 'php/views/header.php';
if(isset($_GET['error'])) {
?>
		<div id="cont">
			<div class="row" id='header'>
				<div class="col-md-12"><img src="images/logo-rp.png"><h1>Войдите</h1></div>
			</div>
			<div>Не правильный логин пароль</div>
			<form action="php/models/login.php" method="POST">
				<label for="login">Логин</label>
				<input type="text" name="login" required>
				<label for="pass">Пароль</label>
				<input type="password" name="pass" required>
				<input type="submit" name="submit" value="Войти">
			</form>
		</div>
<?php	
}
else{
?>
		<div id="cont">
			<div class="row" id='header'>
				<div class="col-md-12"><img src="images/logo-rp.png"><h1>Войдите</h1></div>
			</div>
			<form action="php/models/login.php" method="POST">
				<label for="login">Логин</label>
				<input type="text" name="login" required>
				<label for="pass">Пароль</label>
				<input type="password" name="pass" required>
				<input type="submit" name="submit" value="Войти">
			</form>
		</div>
<?php
}
include_once 'php/views/footer.php';
?>
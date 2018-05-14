<?php
session_start();
include_once '../core/config.php';
include_once 'header.php';
if($_SESSION['state_id'] == 1){
?>
<!-- информационное табло -->
	<div id="cont">
		<div class="row" id='header'>
			<div class="col-md-12"><img src="../../images/logo-rp.png"><h1>Информационное табло <a href="../models/exit.php">Выход</a></h1></div>

		</div>
		<div class="row title">
			<div class="col-md-3">Клиент</div>
			<div class="col-md-3">Окно</div>
			<div class="col-md-3">Клиент</div>
			<div class="col-md-3">Окно</div>
		</div>
			<div id="result">
			<!-- вывод клиентов -->
        	<!-- название функции "ochered"-->
			</div>
		</div>
	</div>
<?php
}
include_once 'footer.php';
?>
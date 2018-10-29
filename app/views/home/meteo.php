<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Consultez la météo de votre ville avant de sortir détecter">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="/css/nav.css">
	<link rel="stylesheet" href="/css/meteo.css">
	<link rel="stylesheet" href="/css/footer.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
	<title>La météo de votre région</title>
</head>
<body>
	<header>
		<?php include 'nav.php'; ?>
	</header>
	<section class="container">
		<div id="widget">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			    <li class="nav-item">
			    	<a class="nav-link active" id="today-tab" data-toggle="tab" href="#today" role="tab" aria-controls="today" aria-selected="true">Aujourd'hui</a>
			    </li>
			    <li class="nav-item">
			    	<a class="nav-link" id="jplusun-tab" data-toggle="tab" href="#jplusun" role="tab" aria-controls="jplusun" aria-selected="false"><?=$data['json']['fcst_day_1']['day_short']; ?></a>
			    </li>
			    <li class="nav-item">
			    	<a class="nav-link" id="jplusdeux-tab" data-toggle="tab" href="#jplusdeux" role="tab" aria-controls="jplusdeux" aria-selected="false"><?=$data['json']['fcst_day_2']['day_short']; ?></a>
			    </li>
			    <li class="nav-item">
			    	<a class="nav-link" id="jplustrois-tab" data-toggle="tab" href="#jplustrois" role="tab" aria-controls="jplustrois" aria-selected="false"><?=$data['json']['fcst_day_3']['day_short']; ?></a>
			    </li>
			</ul>
			<div class="tab-content" id="myTabContent">
			    <div class="tab-pane fade show active mt-5" id="today" role="tabpanel" aria-labelledby="today-tab">
			    	<h2><?= $data['json']['city_info']['name']; ?></h2>
			    	<p class="text-muted">La météo pour le <?= $data['json']['fcst_day_0']['date']; ?></p>
			    	<div class="row">
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>01</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_0']['hourly_data']['1H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['1H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['1H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>03</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_0']['hourly_data']['3H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['3H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['3H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>05</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_0']['hourly_data']['5H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['5H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['5H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>07</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_0']['hourly_data']['7H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['7H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['7H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>09</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_0']['hourly_data']['9H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['9H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['9H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>11</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_0']['hourly_data']['1H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['11H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['11H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>13</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_0']['hourly_data']['13H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['13H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['13H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>15</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_0']['hourly_data']['15H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['15H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['15H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>17</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_0']['hourly_data']['17H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['17H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['17H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>19</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_0']['hourly_data']['19H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['19H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['19H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>21</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_0']['hourly_data']['21H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['21H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['21H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>23</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_0']['hourly_data']['23H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['23H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_0']['hourly_data']['23H00']['APCPsfc']; ?>mm</p>
						</div>
					</div>
					<p class="text-right text-muted mt-3"><small>www.prevision-meteo.ch</small></p>
			    </div>
			    <div class="tab-pane fade mt-5" id="jplusun" role="tabpanel" aria-labelledby="jplusun-tab">
			    	<h2><?= $data['json']['city_info']['name']; ?></h2>
					<p class="text-muted">La météo pour le <?= $data['json']['fcst_day_1']['date']; ?></p>
			    	<div class="row">
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>01</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_1']['hourly_data']['1H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['1H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['1H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>03</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_1']['hourly_data']['3H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['3H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['3H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>05</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_1']['hourly_data']['5H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['5H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['5H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>07</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_1']['hourly_data']['7H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['7H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['7H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>09</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_1']['hourly_data']['9H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['9H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['9H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>11</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_1']['hourly_data']['1H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['11H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['11H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>13</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_1']['hourly_data']['13H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['13H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['13H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>15</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_1']['hourly_data']['15H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['15H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['15H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>17</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_1']['hourly_data']['17H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['17H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['17H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>19</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_1']['hourly_data']['19H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['19H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['19H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>21</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_1']['hourly_data']['21H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['21H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['21H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>23</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_1']['hourly_data']['23H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['23H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_1']['hourly_data']['23H00']['APCPsfc']; ?>mm</p>
						</div>
					</div>
					<p class="text-right text-muted mt-3"><small>www.prevision-meteo.ch</small></p>
			    </div>
			    <div class="tab-pane fade mt-5" id="jplusdeux" role="tabpanel" aria-labelledby="jplusdeux-tab">
			    	<h2><?= $data['json']['city_info']['name']; ?></h2>
					<p class="text-muted">La météo pour le <?= $data['json']['fcst_day_2']['date']; ?></p>
			    	<div class="row">
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>01</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_2']['hourly_data']['1H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['1H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['1H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>03</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_2']['hourly_data']['3H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['3H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['3H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>05</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_2']['hourly_data']['5H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['5H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['5H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>07</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_2']['hourly_data']['7H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['7H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['7H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>09</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_2']['hourly_data']['9H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['9H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['9H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>11</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_2']['hourly_data']['1H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['11H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['11H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>13</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_2']['hourly_data']['13H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['13H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['13H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>15</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_2']['hourly_data']['15H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['15H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['15H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>17</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_2']['hourly_data']['17H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['17H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['17H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>19</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_2']['hourly_data']['19H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['19H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['19H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>21</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_2']['hourly_data']['21H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['21H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['21H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>23</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_2']['hourly_data']['23H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['23H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_2']['hourly_data']['23H00']['APCPsfc']; ?>mm</p>
						</div>
					</div>
					<p class="text-right text-muted mt-3"><small>www.prevision-meteo.ch</small></p>
				</div>
				<div class="tab-pane fade mt-5" id="jplustrois" role="tabpanel" aria-labelledby="jplustrois-tab">
					<h2><?= $data['json']['city_info']['name']; ?></h2>
					<p class="text-muted">La météo pour le <?= $data['json']['fcst_day_3']['date']; ?></p>
			    	<div class="row">
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>01</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_3']['hourly_data']['1H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['1H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['1H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>03</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_3']['hourly_data']['3H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['3H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['3H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>05</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_3']['hourly_data']['5H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['5H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['5H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>07</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_3']['hourly_data']['7H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['7H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['7H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>09</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_3']['hourly_data']['9H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['9H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['9H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>11</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_3']['hourly_data']['1H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['11H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['11H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>13</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_3']['hourly_data']['13H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['13H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['13H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>15</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_3']['hourly_data']['15H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['15H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['15H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>17</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_3']['hourly_data']['17H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['17H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['17H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>19</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_3']['hourly_data']['19H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['19H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['19H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>21</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_3']['hourly_data']['21H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['21H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['21H00']['APCPsfc']; ?>mm</p>
						</div>
						<div class="col-2 col-sm-1 d-flex flex-column align-items-center justify-content-between">
							<p class="hour"><b>23</b><small>00</small></p>
							<p><img src="<?= $data['json']['fcst_day_3']['hourly_data']['23H00']['ICON']; ?>"></p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['23H00']['TMP2m']; ?>°</p>
							<p><?= $data['json']['fcst_day_3']['hourly_data']['23H00']['APCPsfc']; ?>mm</p>
						</div>
					</div>
					<p class="text-right text-muted mt-3"><small>www.prevision-meteo.ch</small></p>
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<a class="btn btn-warning mt-5 col-sm-2 float-right" href="javascript:history.go(-1)"><i class="fas fa-undo-alt"></i>&nbsp;Retour</a>
		</div>
	</section>
	<!-- inclusion du footer -->
	<?php include("footer.php"); ?>

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
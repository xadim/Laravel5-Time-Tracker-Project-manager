<html>
	<head>
		<title>Graphite Time Tracker / Project Manager</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
				background-color: #E2E2E2;
			}

			.containerz {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.contentz {
				text-align: center;
				display: inline-block;
				width: 100%;
				max-width: 1196px;
			}

			.titlez {
				font-size: 40px;
				margin-bottom: 40px;
			}

			.quotez {
				font-size: 24px;
			}

			.logo{
				  background:   url(http://c3drive.com//img/graphite-logo.svg) 50% 50% / 140px 34px no-repeat;
				  height: 40px;
				  width: 100%;
				  margin-top: 10px;
				  padding-top: 4px;
			}

			.panel-heading{
				background-color: #FCCA57 !important;
				color: #000 !important;
				font-size: 18px;
				font-weight: 500;
				line-height: 1.1;
			}

			.control-label, .checkbox{
				color: #000 !important;
				font-size: 18px;
				font-weight: 500;
				line-height: 1.1;
			}

			.btn-primary{
				background-color: #FCCA57 !important;
				border: 1px solid  #FCCA57 !important;
				color: #000 !important;
			}

			.btn-link{
				font-weight: 600;
				color: #FCCA57 !important;
			}
		</style>
	</head>
	<body>
		<div class="containerz">
			<div class="contentz">
				<div class="titlez">
					<div class="logo"></div>
				</div>
				<div class="quotez">@yield('content')</div>
			</div>
		</div>
	</body>
</html>

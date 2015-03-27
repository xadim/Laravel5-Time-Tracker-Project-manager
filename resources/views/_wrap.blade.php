<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
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
		</style>
	</head>
	<body>
		<div class="containerz">
			<div class="contentz">
				<div class="titlez">Graphite Time Track</div>
				<div class="quotez">@yield('content')</div>
			</div>
		</div>
	</body>
</html>

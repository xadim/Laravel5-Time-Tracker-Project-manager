<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Graphite Time Tracker / Project Manager</title>

	<!-- Styles -->
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Js -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ asset('/js/customs.js') }}"></script>
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script>
		//autoload project with company client
		jQuery(document).ready(function($) {
		  $( "#project" ).autocomplete({
		    source: <?php print_r(retrieveProject());?>,
		    minLength: 1,
		    select: function( event, ui ) {
		            event.preventDefault();
		            $('#project').val(ui.item.value);
					this.value = ui.item.label;
					$('#projecth').val(ui.item.id);
					$('#client').val(ui.item.class);
		    }
		  });
		});




		jQuery(document).ready(function($) {
			 function split(val) {
		        return val.split(/,\s*/);
		    }

		    function extractLast(term) {
		        return split(term).pop();
		    }
		    $("#authorized_users").autocomplete({
		        minLength: 1,
		        source: function(request, response) {
		            $.ajax({
		                url: "",
		                data: {
		                    term: extractLast(request.term)
		                },
		                dataType: "json",
		                type: "POST",
		                success: function(data) {
		                    response(data);
		                },
		                error: function() {
		                    // added an error handler for the sake of the example
		                    response($.ui.autocomplete.filter(
		                        <?php print_r(retrieveUsers());?>
		                        , extractLast(request.term)));
		                }
		            });
		        },
		        focus: function() {
		            // prevent value inserted on focus
		            return false;
		        },
		        select: function(event, ui) {
		            var terms = split(this.value);
		            // remove the current input
		            terms.pop();
		            // add the selected item
		            terms.push(ui.item.value);
		            // add placeholder to get the comma-and-space at the end
		            terms.push("");
		            this.value = terms.join(", ");
		            return false;
		        }
		    });
		});


		jQuery(document).ready(function($) {
		  $( "#client" ).autocomplete({
		    source: <?php print_r(retrieveClient());?>,
		    minLength: 1,
		    select: function( event, ui ) {
		            event.preventDefault();
		            $('#client').val(ui.item.value);
					this.value = ui.item.label;
					$('#clienth').val(ui.item.id);
		    }
		  });
		});

		jQuery(document).ready(function($) {
			$("#project_form").submit(function(e)
			    {
			        var postData = $(this).serializeArray();
			        var formURL = $(this).attr("action");

			        $.ajax(
			            {
			                url : 'projects',
			                type: "POST",
			                data : postData,
			                success:function(data)
			                {
			                     window.location = 'projects';
			                     $( ".log" ).text( "Project added with success!");
			                },
			                error: function(data)
			                {
			                    $( ".error" ).text( "Whoops! There were some problems with your input.");
			                    //in the responseJSON you get the form validation back.
			                }
			            });
			        e.preventDefault(); //STOP default action
			        e.unbind(); //unbind. to stop multiple form submit.
			});
		});

		jQuery(document).ready(function($) {
			$("#phase_form").submit(function(e)
			    {
			        var postData = $(this).serializeArray();
			        var formURL = $(this).attr("action");

			        $.ajax(
			            {
			                url : 'phases',
			                type: "POST",
			                data : postData,
			                success:function(data)
			                {
			                     window.location = 'phases';
			                     $( ".log" ).text( "Phase added with success!");
			                },
			                error: function(data)
			                {
			                    $( ".error" ).text( "Whoops! There were some problems with your input.");
			                    //in the responseJSON you get the form validation back.
			                }
			            });
			        e.preventDefault(); //STOP default action
			        e.unbind(); //unbind. to stop multiple form submit.
			});
		});
	</script>
</head>
<body>
<div class="container">

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand logo" href="{{ url('phases') }}"></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">

				<li>{!! link_to_route('clients.index', 'Clients') !!}</li>

				<li>{!! link_to_route('projects.index', 'Projects') !!}</li>

				<li>{!! link_to_route('types.index', 'Types') !!}</li>

				@if(Auth::user()->id == 3)
					
					<li><a href="{{ url('users') }}">Users</a></li>
						
				@endif
				
					@if (Auth::guest())
							<li><a href="{{ url('/auth/login') }}">Login</a></li>
							
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>


	
	@yield('content')

	<!-- Scripts 
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>-->
</body>
</html>

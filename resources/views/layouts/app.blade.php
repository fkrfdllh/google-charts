<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Report Traffic X Company</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<!-- <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script> -->
	<script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<script type="text/javascript">
	
	// user_agent
	var user_agent = <?php echo $user_agent; ?>;
	console.log(user_agent);
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	// url
	var url = <?php echo $url; ?>;
	console.log(url);
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	// http_host
	var http_host = <?php echo $http_host; ?>;
	console.log(http_host);
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function errorHandler(errorMessage) {
	    console.log(errorMessage);

	    google.visualization.errors.removeError(errorMessage.id);
	}

	function drawChart() {
		// user_agent, url, http_host
		var data1 = google.visualization.arrayToDataTable(user_agent);
		var data2 = google.visualization.arrayToDataTable(url);
		var data3 = google.visualization.arrayToDataTable(http_host);

		// options
		var options1 = {
			title: 'User Agent',
		};
		var options2 = {
			title: 'URL',
		};
		var options3 = {
			title: 'HTTP Host',
		};

		// charts
		var chart1 = new google.visualization.ColumnChart(document.getElementById('user_agent'));
		var chart2 = new google.visualization.ColumnChart(document.getElementById('url'));
		var chart3 = new google.visualization.ColumnChart(document.getElementById('http_host'));

		// error handler
		google.visualization.events.addListener(chart1, 'error', errorHandler);
		google.visualization.events.addListener(chart2, 'error', errorHandler);
		google.visualization.events.addListener(chart3, 'error', errorHandler);

		google.visualization.events.addListener(chart1, 'ready', function() {
			chart1.innerHTML = '<img src="' + chart1.getImageURI() + '">';
			console.log(chart1.innerHTML);
		});

		google.visualization.events.addListener(chart2, 'ready', function() {
			chart2.innerHTML = '<img src="' + chart2.getImageURI() + '">';
			console.log(chart2.innerHTML);
		});

		google.visualization.events.addListener(chart3, 'ready', function() {
			chart3.innerHTML = '<img src="' + chart3.getImageURI() + '">';
			console.log(chart3.innerHTML);
		});

		chart1.draw(data1, options1);
		chart2.draw(data2, options2);
		chart3.draw(data3, options3);
	}

	</script>
</head>
<body>

	@yield('header')

	@yield('content')

	@yield('footer')

</body>
</html>
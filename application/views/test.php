<!DOCTYPE html>
<html>

<head>
<!-- Include Bootstrap for styling -->
<link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

<style>
	.qr-code {
	max-width: 200px;
	margin: 10px;
	}
</style>

<title>QR Code Generator</title>
</head>

<body>
<div class="container-fluid">
    <h1>Test contratto QR</h1>
	<div class="text-center">

	<!-- Get a Placeholder image initially,
	this will change according to the
	data entered later -->
	<img src=
"https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
		class="qr-code img-thumbnail img-responsive" />
	</div>

	
</div>
<script src=
	"https://code.jquery.com/jquery-3.5.1.js">
</script>

<script>
	// Function to HTML encode the text
	// This creates a new hidden element,
	// inserts the given text into it
	// and outputs it out as HTML
	function htmlEncode(value) {
	return $('<div/>').text(value)
		.html();
	}


	// Specify an onclick function
	// for the generate button

		// Generate the link that would be
		// used to generate the QR Code
		// with the given data
		let finalURL =
'https://chart.googleapis.com/chart?cht=qr&chl=' +
		htmlEncode('12345') +
		'&chs=160x160&chld=L|0'

		// Replace the src of the image with
		// the QR code image
		$('.qr-code').attr('src', finalURL);
</script>
</body>

</html>

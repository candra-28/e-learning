<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	Nama Depan: {{ $emailFeedback['first_name']}} <br>
	Nama Depan: {{ $emailFeedback['last_name']}} <br><br>
	 
	Email: {{ $emailFeedback['email']}} <br><br>

	Pesan: {{ $emailFeedback['message']}}

</body>
</html>
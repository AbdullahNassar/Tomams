<!DOCTYPE html>
<html>
<head>
	<title>registeration mail </title>
</head>
<body>
		<h1>Hi,  {{ $member->f_name }}.</h1>
		<p>
			we sent you this message to inform you that your profile has been activated successfully.
			thanks for choosing us :)
			<a href="{{ url('/login') }}"> your login link</a>
		</p>
</body>
</html>

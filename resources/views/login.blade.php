<!doctype HTML>
<html>
<head>

</head>
<body>

<form method='POST'>
    @csrf

    <input type='text' name='email' />
    <input type='password' name='password' />
    <input type='submit' name='submit' value='Submit' />
</form>
</body>
</html>
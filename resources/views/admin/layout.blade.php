<!doctype HTML>
<html>
<head>

<style>

h1 {
    font-size:1.4em;
}
h2 {
    font-size:1.3em;
}
h3 {
    font-size:1.2em;
}
h1,h2,h3 {
    color:#22aacc;
}

.admin-form-input {
    display:block;
    text-align:left;
    margin-bottom:20px;
}

.admin-form-input__label {
    display:block;
}


</style>
</head>
<body>
<header><h1>Louisville Resources Backend</h1>
<a href='/admin'>Categories</a> | <a href='/admin/business'>Businesses</a>
</header>
<main>
@yield('main')
</main>

</body>
</html>
<style type="text/css">
    body {
        font-family: "Trebuchet MS",Arial;
        font-size: 14px;
        background-color: #212426;
        color: #11151E;
    }

    input, textarea, select {
        font-family:inherit;
        font-size:inherit;
        font-weight:inherit;
    }

    #signup_form {
        margin-left: auto;
        margin-right: auto;
        margin-top: 10em;
        width: 360px;

        font-size: 16px;

    }

    #signup_form .heading {
        text-align: center;
        font-size: 22px;
        font-weight: bold;
        color: #B9AA81;
    }

    #signup_form form {

        background-color: #B9AA81;
        padding: 10px;

        border-radius: 8px;
        -moz-border-radius: 8px;
        -webkit-border-radius: 8px;

    }

    #signup_form form label {
        font-weight: bold;
    }

    #signup_form form input[type=text],input[type=password] {
        width: 330px;
        font-weight: bold;
        padding: 8px 6px;

        border: 1px solid #FFF;
        border-radius: 4px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
    }

    #signup_form form input[type=submit] {
        display: block;
        margin: auto;
        width: 200px;
        font-size: 18px;
        background-color: #FFF;
        border: 1px solid #BBB;
    }

    #signup_form form input[type=submit]:hover {
        border-color: #000;
    }

    #signup_form .error {
        font-size: 13px;
        color: #690C07;
        font-style: italic;
    }

</style>

<div id="signup_form">

	<p class="heading">Login</p>

	<form action="/sign/in" method="post">

	<p>
		<label for="username">Username: </label>
		<input type="text" name="username" value=""  />	</p>
	<p>
		<label for="password">Password: </label>
		<input type="password" name="password" value=""  />	</p>
        <p>
		<input type="submit" name="submit" value="Enter"  />	</p>
	</form>

</div>
<!doctype html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width,
		initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://www.google.com/recaptcha/api.js"
			async defer></script>
</head>

<body>
	<div class="container mt-5">
		<div class="card">
			<div class="card-header text-center">
				Google reCaptcha </div>

			<div class="card-body">
				<form action="validate-captcha.php"
					method="post">

					<div class="form-group">

						<label for="exampleInputEmail1">
							First Name</label>
						<input type="text" name="name"
							class="form-control" id="name"
							required="">
					</div>

					<div class="form-group">

						<label for="exampleInputEmail1">
							Email </label>
						<input type="email" name="email"
							class="form-control" id="email"
							aria-describedby="emailHelp"
							required="">
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">
							Password</label>
						<input type="password" name="password"
							class="form-control" id="password"
							required="">
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">
							Confirm Password</label>
						<input type="password" name="cpassword"
							class="form-control" id="cpassword"
							required="">
					</div>

					<label>
						<input type="checkbox" name="remember"
							style="margin-bottom:15px">
							I Accepts terms and conditions
					</label>

					<script src="https://www.google.com/recaptcha/api.js"
							async defer></script>
					<div class="g-recaptcha" id="feedback-recaptcha"
						data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}">
					</div>
					<input type="submit" name="password-reset-token"
						class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
</body>

</html>

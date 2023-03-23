<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<title>
		{{ env('APP_NAME')}} | {{ ($page_title ?? '') }}
	</title>
	<meta name="description" content="Login">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">

	<!-- Call App Mode on ios devices -->
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<!-- Remove Tap Highlight on Windows Phone IE -->
	<meta name="msapplication-tap-highlight" content="no">

	<!-- base css -->
	<meta name="description" content="Page Title">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
	<!-- Call App Mode on ios devices -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Remove Tap Highlight on Windows Phone IE -->
	<meta name="msapplication-tap-highlight" content="no">

	<!-- smartadmin base css -->
	<link id="vendorsbundle" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/vendors.bundle.css') }}">
	<link id="myskin" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/skins/skin-master.css') }}">
	<link id="appbundle" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/app.bundle.css') }}">
	<link rel="stylesheet" media="screen, print" href="{{asset('css/smartadmin/page-login.css')}}">
	<link id="mytheme" rel="stylesheet" media="screen, print" href="#">

	<!-- Place favicon.ico in the root directory -->
	<link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('img/favicon.png') }}" rel="icon" />
	<link href="{{ asset('img/logo-icon.png') }}" rel="apple-touch-icon" sizes="180x180" />
	<link href="{{ asset('img/logo-icon.png') }}" rel="safari-pinned-tab.svg" color="#5bbad5" />

	<!-- Font Awsome -->
	<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-light.css') }}">
	<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-regular.css') }}">
	<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-solid.css') }}">
	<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-brands.css') }}">



	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Scripts -->
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

	<div class="page-wrapper">
		<div class="page-inner bg-brand-gradient">
			<div class="page-content-wrapper bg-transparent m-0">
				<div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
					<div class="d-flex align-items-center container p-0">
						<div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9 border-0">
							<a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
								{{-- <img src="img/logo.png" alt="SmartCompany WebApp" aria-roledescription="logo"> --}}
								<span class="page-logo-text mr-1">Viral Niaga Berjaya</span>
							</a>
						</div>
					</div>
				</div>

				<div class="flex-1 my-bg" style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
					<div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
						<div class="row">
							<div class="col-lg-4"></div>
							<div class="col-lg-4 ml-auto">
								<h1 class="text-white fw-300 mb-3">
									Reset Password
								</h1>
								<div class="card p-4 rounded-plus bg-faded">
									<div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
										{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
									</div>
									<!-- Session Status -->
									<x-auth-session-status class="mb-4" :status="session('status')" />

									<form method="POST" action="{{ route('password.email') }}">
										@csrf

										<!-- Email Address -->
										<div>
											<x-input-label for="email" :value="__('Email')" />
											<x-text-input id="email" class="form-control form-control-mdblock mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
											<x-input-error :messages="$errors->get('email')" class="mt-2" />
										</div>

										<div class="flex items-center justify-end mt-4">
											<x-primary-button>
												{{ __('Email Password Reset Link') }}
											</x-primary-button>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-4"></div>
						</div>
					</div>
				</div>
				<div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
					2023 © Viral Niaga Berjaya
				</div>
			</div>
		</div>
	</div>
	{{-- @include('partials.pagesettings') --}}
	<script src="{{ asset('js/vendors.bundle.js') }}"></script>
	<script src="{{ asset('js/app.bundle.js') }}"></script>
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/6.0.0/intro.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/6.0.0/intro.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/6.0.0/intro.min.js.map"></script> --}}

	<script>
		const togglePassword = document.querySelector('#togglePassword');
		const password = document.querySelector('#password');

		togglePassword.addEventListener('click', function(e) {
			// toggle the type attribute
			const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			password.setAttribute('type', type);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
		});
	</script>
	<script>
		$("#js-login-btn").click(function(event) {

			// Fetch form to apply custom Bootstrap validation
			var form = $("#js-login")

			if (form[0].checkValidity() === false) {
				event.preventDefault()
				event.stopPropagation()
			}

			form.addClass('was-validated');
			// Perform ajax submit here...
		});
	</script>
</body>

</html>

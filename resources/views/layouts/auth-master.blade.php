<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>URL Shortner</title>

    @include('layouts.partial.header-assets')

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

</head>

<body>
    @include('layouts.partial.header')
    <div class="account-section bg_img" data-background="{{ asset('assets/images/account-bg.jpg') }}">
        <div class="container">
            @yield('content')
        </div>
    </div>

    @include('layouts.partial.footer-assets')

</body>


</html>
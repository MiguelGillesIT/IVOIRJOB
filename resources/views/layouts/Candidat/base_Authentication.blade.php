<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">
    <link rel="stylesheet" id="css-main" href="@yield('css_file')">
    <title>IVOIRJOB | @yield('Page_Title')</title>
</head>
<body>
        {{----}}
        <div id="page-container" class="side-trans-enabled">@yield('content_Authentication')</div>
        {{----}}
</body>
</html>
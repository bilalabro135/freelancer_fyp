<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <style>
        body {
            text-align: center;
        }
        h1 {
            font-size: 50px;
        }
        body {
            font: 20px Helvetica, sans-serif;
            color: #333;
        }
        article {
            display: block;
            text-align: left;
            width: 50%;
            margin: 0 auto;
        }
        a {
            color: #dc8100;
            text-decoration: none;
        }
        a:hover {
            color: #333;
            text-decoration: none;
        }
        .container-custom{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin: 0 auto;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container-custom">
        <article>
            <h1>We're sorry, the page you requested cannot be found.</h1>
            <div>
                <p>The URL may be misspelled or the page you're looking for is no longer available. Feel free to <a href="{{ url('/home') }}">return to the homepage</a> </p>
            </div>
        </article>
    </div>
</body>
</html>

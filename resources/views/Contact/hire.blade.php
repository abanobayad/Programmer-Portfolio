<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hire Response </title>
</head>

<body>

</body>

</html>

<div class="card">
    <div class="card-header">
        <h2>Hello Abanoub,</h2>
    </div>
    <div class="card-body">
        <h4 class="card-title">You received an email from : {{ $email }}
            <br>
            Here are the details:
        </h4>
        <p class="card-text">
            Email: {{ $email }}
        </p>
        <p class="card-text">
            Message: {{ $user_message }}
        </p>
    </div>
    <div class="card-footer text-muted">
        Thank You
    </div>
</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/style.css">
    <title>Document</title>
    <style>
        body {
            background-color: rgb(150, 180, 100);
        }

        form {
            margin-top: 20%;
            border: 5px dotted black;
            border-radius: 35px;
            padding: 30px;
        }
    </style>
</head>

<body>
    <div style="display: flex; justify-content: center;">
        <form action="{{ url('/') }}" method="get">

            <!-- Quelle variabili di php tra le graffe si chiamano binding unidirezionali -->
            <label style="margin: 10px;">{{$messaggio}}</label> <br>
            {{$nome}}<br>
            {{$email}} <br>
            {{$telefono}}<br>
            {{$textarea}}<br>
            <input style="margin: 5px;" type="submit" value="Modifica messaggio">
        </form>
    </div>

</body>

</html>
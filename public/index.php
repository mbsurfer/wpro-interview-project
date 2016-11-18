<?php

require __DIR__ . '/../vendor/autoload.php';

//http://docs.guzzlephp.org/en/latest/quickstart.html
$client = new GuzzleHttp\Client(['base_uri' => 'http://swapi.co/api/']);

$res = $client->request('GET', $base_url.'people/?search=r2');
echo $res->getBody();













?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">

    <div class="text-center">
        <h1>SWAPI Exercise</h1>
        <p class="lead"><a href="https://swapi.co/documentation">https://swapi.co/documentation</a></p>
    </div>

    <form>
        <div class="form-group">
            <label>Select Type</label>
            <select class="form-control">
                <option>People</option>
                <option>Films</option>
                <option>Starships</option>
                <option>Vehicals</option>
                <option>Species</option>
                <option>Planets</option>
            </select>
        </div>

        <div class="form-group">
            <label>Search</label>
            <input type="text" class="form-control" placeholder="Search">
        </div>

    </form>

    <div class="results">

        <p>Your Search Results...</p>

       <table class="table table-inverse">
            <thead>
                <th>Example Col 1</th>
                <th>Example Col 2</th>
                <th>Example Col 3</th>
                <th>Example Col 4</th>
            </thead>
           <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
           </tbody>
       </table>

    </div>

</div><!-- /.container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../repository/db.php';
require __DIR__ . '/../repository/favorites.php';
require __DIR__ . '/../repository/itemTypes.php';


//http://docs.guzzlephp.org/en/latest/quickstart.html
$client = new GuzzleHttp\Client(['base_uri' => 'http://swapi.co/api/']);

$params = $_POST;

//form url to get from star wars api
if( empty($params['paginateUrl']) ) {
    if( isset($params['item_type']) ) {
        $apiUrl = $params['item_type'].'/';
    } else {
        //default
        $apiUrl = 'people/';
    }

    $apiUrl .= isset($params['term']) ? '?search='.$params['term'] : '';
} else {
    $apiUrl = $params['paginateUrl'];
}

$res = $client->request('GET', $apiUrl);
$content = $res->getBody()->getContents();
$content = isset($content) ? json_decode($content) : '';

//pulled from db
$itemTypes = getAllItemTypes($dbConn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>STAR WARS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

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

    <form name="star_orm" method="POST">
        <div class="form-group">
            <label>Select Type</label>
            <select class="form-control" name="item_type">
                <?php foreach( $itemTypes as $itemTypeId => $itemType ) : ?>
                    <option value="<?=$itemType['item_code']?>" data-type-id="<?=$itemTypeId?>"
                        <?= ( isset( $params['item_type'] ) && $params['item_type'] == $itemType['item_code'] ) ? 'selected' : '' ?>
                    ><?=ucfirst($itemType['item_name'])?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Search</label>
            <input type="text" class="form-control" placeholder="Search" name="term"
            value="<?=isset($params['term']) ? $params['term'] : '' ?>">
        </div>

        <div class="form-group row">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <div class="results">

<?php if( empty($content) ) :?>
    <p class="text-info">No results found.</p>
<?php else: ?>
       <table class="table table-inverse table-striped star-table">
            <thead>
                <?php
                    $headers = array_keys( get_object_vars(current($content->results)) );
                    foreach( $headers as $header ) :
                ?>
                        <th><?=ucfirst( str_replace('_', ' ', $header) )?></th>
                <?php
                    endforeach;
                ?>
            </thead>
           <tbody>
               <?php  foreach( $content->results as $result ) :  ?>
                    <tr class="star-item">
                        <?php foreach( $result as $key => $param ): ?>
                            <td class="<?=$key?>"><?= is_array($param) ? implode('<br> ', $param ) : $param ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
           </tbody>
       </table>
<?php endif; ?>

    <div class="row">
        <?php if( isset($content->previous) ) : ?>
            <button type="button" name="paginate" class="btn btn-primary" data-url="<?=$content->previous?>">Previous</button>
        <?php endif; ?>
        <?php if( isset($content->next) ) : ?>
            <button type="button" name="paginate" class="btn btn-primary" data-url="<?=$content->next?>">Next</button>
        <?php endif; ?>
    </div>

</div>

</div><!-- /.container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
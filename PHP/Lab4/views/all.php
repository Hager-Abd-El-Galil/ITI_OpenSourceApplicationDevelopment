<?php
$current_index = isset($_GET["current"]) ? intval($_GET["current"]) : 0;
$all_records = $_DB -> get_number_of_records();
$next_index = ($current_index + __RECORDS_PER_PAGE__) >= intval($all_records) ? 0: $current_index + __RECORDS_PER_PAGE__;
$previous_index = (($current_index - __RECORDS_PER_PAGE__) >= 0) ? ($current_index - __RECORDS_PER_PAGE__) : intval($all_records) - __RECORDS_PER_PAGE__;
$items = $_DB -> get_all_records_paginated(array() , $current_index);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Over+the+Rainbow" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>GLASSES STORE | All Products</title>
</head>

<body>
    <div class="container-fluid col-12 bg-light">
        <div class=" row ">
            <div class="col-12">
                <h1 class="text-center my-5">GLASSES STORE</h1>
                <div class=" col-12 d-flex flex-wrap justify-content-center">
                    <?php
                        foreach($items as $item){
                            echo 
                                "<div class='cards_box col-12 col-md-3'>
                                    <div class='product_card'>";
                                    if($item['discontinued'] == 1){
                                        echo "<div class='discount text-center'>10%<br>SALE</div>";
                                    }
                                    echo "<div class='hover_color_bubble'></div>
                                        <div class='card_title'>
                                            <h3 class='text-center'>" . strtoupper($item['product_name']) . "</h3>
                                        </div>
                                        <div class='card_description'>" .
                                            "<img class='image' src='./views/images/" . $item["photo"] . "' /></br>" .
                                            "<p> <b>ID: </b>" . $item['id'] . "</p>" .
                                            "<p> <b>CODE: </b>" . $item['product_code'] . "</p>" .
                                            "<p> <b>EGP </b>" . $item['list_price'] . "</p>" .
                                            "<div class='ratings my-4'>
                                                <i class='fa fa-star rating-color' style = 'font-size:24px;'></i> <b>" . $item['rating'] . "</b>
                                            </div>" .
                                            '<button type="button" class="show_more_btn mb-3"><a href=" ' . $_SERVER['PHP_SELF'] . '?id=' . $item['id'] . '">Show More</a> </button>
                                        </div>
                                    </div>
                                </div>';         
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php 
    echo 
    "<div class='col-12 d-flex justify-content-center'>" .
        '<button type="button" class="prev-btn"><a href=" ' . $_SERVER['PHP_SELF'] . "?current=" . $previous_index . '"><b><</b>PREVIOUS</a></button>' .
        '<button type="button" class="next-btn"><a href=" ' . $_SERVER['PHP_SELF'] . "?current=" . $next_index . '">NEXT<b>></b></a></button>' .
    "</div>";
    ?>
</body>

</html>
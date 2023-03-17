<?php
$id = (isset($_GET["id"])) ? intval($_GET["id"]) : 0;
$current_item = $_DB -> get_record_by_id($id)[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>GLASSES STORE | <?php echo $current_item['product_name']?> Details</title>
</head>

<body>
    <div class="container-fluid bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row col-8 d-flex justify-content-center align-items-center">
            <?php
            echo "<div class='cards-box col-8'>
                  <div class='product-card'>";
                    if($current_item['discontinued'] == 1){
                        echo "<div class='discount text-center'>10%<br>SALE</div>";
                    }
                    echo "<div class='hover-color-bubble'></div>
                            <div class='card_title'>
                                <h3 class='text-center my-3'>" . strtoupper($current_item['product_name']) . "</h3>
                            </div>
                            <div class='card-description'>" .
                                "<img class='image' src='./views/images/" . $current_item["photo"] . "' /></br>" .
                                "<p> <b>ID: </b>" . $current_item['id'] . "</p>" .
                                "<p> <b>CODE: </b>" . $current_item['product_code'] . "</p>" .
                                "<p> <b>CATEGORY: </b>" . $current_item['category'] . "</p>" .
                                "<p><i class='location fas fa-map-marker-alt'></i>" .
                                "<span> Made In <b>" . $current_item['country'] . "</b></span></p>" .
                                "<p class='price'> <b>EGP </b>" . $current_item['list_price'] . "</p>" .
                                "<div class='ratings my-4'>
                                    <i class='fa fa-star starone'></i>
                                    <i class='fa fa-star startwo'></i>
                                    <i class='fa fa-star starthree'></i>
                                    <i class='fa fa-star starfour'></i>
                                    <i class='fa fa-star starfive'></i>
                                </div>
                        </div>
                    </div>
                </div>";
                 echo "<script type='text/JavaScript'>
                          var starOne = document.querySelector('.starone');
                          var starTwo = document.querySelector('.startwo');
                          var starThree = document.querySelector('.starthree');
                          var starFour = document.querySelector('.starfour');
                          var starFive = document.querySelector('.starfive');

                          function displayRating(rate) {
                            if (rate > 0 && rate <= 1) {
                                starOne.classList.add('starone', 'rating-color');
                            } else if (rate > 1 && rate <= 2) {
                                starOne.classList.add('starone','rating-color');
                                starTwo.classList.add('startwo', 'rating-color');
                            } else if (rate > 2 && rate <= 3) {
                                starOne.classList.add('starone', 'rating-color');
                                starTwo.classList.add('startwo', 'rating-color');
                                starThree.classList.add('starthree', 'rating-color');
                            } else if (rate > 3 && rate <= 4) {
                                starOne.classList.add('starone', 'rating-color');
                                starTwo.classList.add('startwo', 'rating-color');
                                starThree.classList.add('starthree', 'rating-color');
                                starFour.classList.add('starfour', 'rating-color');
                            } else if (rate > 4 && rate <= 5) {
                                starOne.classList.add('starone', 'rating-color');
                                starTwo.classList.add('startwo', 'rating-color');
                                starThree.classList.add('starthree', 'rating-color');
                                starFour.classList.add('starfour', 'rating-color');
                                starFive.classList.add('starfive', 'rating-color');
                            }
                          }
                         displayRating(" . $current_item['rating'] . ")</script>" ; 
            ?>
        </div>
    </div>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>

</html>
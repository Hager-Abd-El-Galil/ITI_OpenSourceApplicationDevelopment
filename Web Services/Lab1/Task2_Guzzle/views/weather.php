<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
</head>

<body>
    <div>
        <form method="POST">
            <select name='city'>
                <?php
                    $egyptian_cities = get_cities();
                        foreach ($egyptian_cities as $key => $value) {
                            foreach ($value as $k => $val) {
                                if ($k === "id") {$cityid = $val;}
                                if ($k === "name") {echo "<option value='$cityid'>$val</option>";}
                                }
                            }  
                ?>
            </select>
            <button type=" submit" name="submit">Get Weather</button>
        </form>
    </div>
</body>

</html>
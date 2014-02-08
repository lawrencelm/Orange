<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <form name="searchItem" action="index.php" method="get">
        Search: <input type="text" name="search">
        <input type="submit" value="Submit">
    </form>

    <body>
        <?php
        //  Initiate curl
       
        $result = file_get_contents('http://api.popshops.com/v3/products.json?account=euvi718jkbdyfe3ld3xzdouyp&catalog=db46yl7pq0tgy9iumgj88bfj7&keyword=ski+boots');

        var_dump(json_decode($result, true));
        ?>
    </body>
</html>

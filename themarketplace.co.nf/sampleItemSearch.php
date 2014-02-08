<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css">
        <title>The MarketPlace</title>
    </head>

    <div id="header">
        The MarketPlace
    </div>

    <body>



        <?php
        /**
         * For a running Search Demo see: http://amazonecs.pixel-web.org
         */
        if (is_file('sampleSettings.php')) {
            include 'sampleSettings.php';
        }

        defined('AWS_API_KEY');
        defined('AWS_API_SECRET_KEY');
        defined('AWS_ASSOCIATE_TAG');

        require_once 'AmazonECS.class.php';

        try {

            // get a new object with your API Key and secret key. Lang is optional.
            // if you leave lang blank it will be US.
            $amazonEcs = new AmazonECS(AWS_API_KEY, AWS_API_SECRET_KEY, 'com', AWS_ASSOCIATE_TAG);

            // If you are at min version 1.3.3 you can enable the requestdelay.
            // This is usefull to get rid of the api requestlimit.
            // It depends on your current associate status and it is disabled by default.
            //$amazonEcs->requestDelay(true);
            // for the new version of the wsdl its required to provide a associate Tag
            // @see https://affiliate-program.amazon.com/gp/advertising/api/detail/api-changes.html?ie=UTF8&pf_rd_t=501&ref_=amb_link_83957571_2&pf_rd_m=ATVPDKIKX0DER&pf_rd_p=&pf_rd_s=assoc-center-1&pf_rd_r=&pf_rd_i=assoc-api-detail-2-v2
            // you can set it with the setter function or as the fourth paramameter of ther constructor above
            $amazonEcs->associateTag(AWS_ASSOCIATE_TAG);
            
            $search = $amazonEcs->category('Photo')->search('Nikon');
            if ($search) {
                $lookup = $amazonEcs->responseGroup('Images')->lookup($search->ASIN);
                var_dump($lookup); // will give you the item's object and the image's url
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        ?>

    </body>


</html>
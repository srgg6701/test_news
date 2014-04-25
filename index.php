<?php
require_once "router.php";
$content = ob_get_contents();
ob_clean();
?><!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/stylesheets/screen.css">
        <script src="<?php echo SITE_ROOT; ?>/js/common.js"></script>
        <script src="<?php echo SITE_ROOT; ?>/js/jquery-2.1.0.min.js"></script>
    </head>
    <body>
    	<div id="container">
        	<div id="main">
            	<nav>
                	<div id="nav"><a href="<?php echo SITE_ROOT; ?>">Главная</a></div>
                </nav>
                <div role="main">
                	<section>
                		<?=$content?>
                    </section>
                </div>
            </div>
            <footer>
            	<div id="footer">Footer</div>
            </footer>
        </div>
    </body>
</html>

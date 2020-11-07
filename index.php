<?php
ob_start('ob_postprocess');
require_once("./cfg/config.inc.php");
require_once("./core_functions/functions.php");
require_once("./core_functions/jdate_functions.php");
require 'vendor/autoload.php';

$smarty = new Smarty;
$query = new Query();
$frontend = new Frontend();

$smarty->template_dir = "./template/frontend/";
$smarty->assign("main_template", "home.tpl");
require_once("./includes/index.php");
$smarty->display("index.tpl");
function ob_postprocess($buffer)
{
    //$buffer = trim(preg_replace('/\s+/', ' ', $buffer));
    if(strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'GZIP') !== false)
    {
        $buffer = gzencode($buffer);
        header('CONTENT-ENCODING: GZIP');
    }
    return $buffer;
}
?>
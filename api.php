<?
include 'seo.php';
$_SERVER['REQUEST_URI'] = $_SERVER['PATH_INFO'];
$seo = new SEO();
print $seo->getJSON();
?>
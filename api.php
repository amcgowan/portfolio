<?
include 'seo.php';
$_SERVER['REQUEST_URI'] = "/".$_GET['uri'];
$seo = new SEO();
print $seo->getJSON();
?>
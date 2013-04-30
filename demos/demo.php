<?php

require '../src/jjok/XmlSitemap/Sitemap.php';
require '../src/jjok/XmlSitemap/Url.php';

$sitemap = new \jjok\XmlSitemap\Sitemap();
$sitemap->addUrl(new \jjok\XmlSitemap\Url('http://www.example.com/', 0.6, null, null));
$sitemap->addUrl(
	new \jjok\XmlSitemap\Url(
		htmlspecialchars('http://www.example.com/qwerty?something=1&something_else=2', ENT_QUOTES, 'UTF-8'),
		0.6, null, null
	)
);

header('Content-type: application/xml; charset=utf-8');
echo $sitemap->toString();

<?php

require '../src/jjok/XmlSitemap/Sitemap.php';
require '../src/jjok/XmlSitemap/Url.php';

$sitemap = new \jjok\XmlSitemap\Sitemap();
$sitemap->addUrl(new \jjok\XmlSitemap\Url('http://www.example.com/'));
$sitemap->addUrl(
	new \jjok\XmlSitemap\Url(
		htmlspecialchars('http://www.example.com/qwerty?something=1&something_else=2', ENT_QUOTES, 'UTF-8'),
		0.6,
		'2013-06-28',
		'hourly'
	)
);

header('Content-type: application/xml; charset=utf-8');
echo $sitemap->toString();

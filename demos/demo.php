<?php

use jjok\XmlSitemap\Builder;
use jjok\XmlSitemap\Sitemap;
use jjok\XmlSitemap\Url;

require '../src/jjok/XmlSitemap/Builder.php';
require '../src/jjok/XmlSitemap/Sitemap.php';
require '../src/jjok/XmlSitemap/Url.php';

$sitemap = new Sitemap();
$sitemap->addUrl(new Url('http://www.example.com/'));
$sitemap->addUrl(
	new Url(
		htmlspecialchars('http://www.example.com/qwerty?something=1&something_else=2', ENT_QUOTES, 'UTF-8'),
		0.6,
		'2013-06-28',
		'hourly'
	)
);

header('Content-type: application/xml; charset=utf-8');

$builder = new Builder();
$xml = $builder->sitemapToXML($sitemap);
echo $xml->saveXML();

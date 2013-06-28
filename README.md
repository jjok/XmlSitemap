XmlSitemap
==========

[![Build Status](https://travis-ci.org/jjok/XmlSitemap.png)](https://travis-ci.org/jjok/XmlSitemap)

Generate an XML sitemap.

	$sitemap = new \jjok\XmlSitemap\Sitemap();
	$sitemap->addUrl(new \jjok\XmlSitemap\Url('http://www.example.com/'));
	$sitemap->addUrl(new \jjok\XmlSitemap\Url('http://www.example.com/some-page', 0.6, '2013-06-28', 'hourly'));

	header('Content-type: application/xml; charset=utf-8');
	echo $sitemap->toString();


Run Tests
---------

	phpunit


Copyright (c) 2013 Jonathan Jefferies

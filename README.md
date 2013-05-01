XmlSitemap
==========

[![Build Status](https://travis-ci.org/jjok/XmlSitemap.png)](https://travis-ci.org/jjok/XmlSitemap)

Generate an XML sitemap.

	$sitemap = new \jjok\XmlSitemap\Sitemap();
	$sitemap->addUrl(new \jjok\XmlSitemap\Url('http://www.example.com/', null, null, 0.6));
	$sitemap->addUrl(new \jjok\XmlSitemap\Url('http://www.example.com/some-page', null, null, 0.6));

	header('Content-type: application/xml; charset=utf-8');
	echo $sitemap->toString();


Run Tests
---------

	phpunit


Copyright (c) 2013 Jonathan Jefferies
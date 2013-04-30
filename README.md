XmlSitemap
==========

Generate an XML sitemap.

	$sitemap = new \jjok\Sitemap\XmlSitemap();
	$sitemap->addUrl(new \jjok\Sitemap\Url('http://www.example.com/', null, null, 0.6));
	$sitemap->addUrl(new \jjok\Sitemap\Url('http://www.example.com/some-page', null, null, 0.6));

	header('Content-type: application/xml; charset=utf-8');
	echo $sitemap->toString();

Run Tests
---------

	phpunit

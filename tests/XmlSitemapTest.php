<?php

require_once 'src/jjok/XmlSitemap/Sitemap.php';
require_once 'src/jjok/XmlSitemap/Url.php';

use \jjok\XmlSitemap\Sitemap;
use \jjok\XmlSitemap\Url;

class XmlSitemapTest extends PHPUnit_Framework_TestCase {
	
	/**
	 *  @covers \jjok\XmlSitemap\Sitemap::toString
	 */
	public function testCanBeConvertedToString() {
		$sitemap = new Sitemap();
		
		$this->assertXmlStringEqualsXmlString('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" />', $sitemap->toString());
	}

	/**
	 *  @covers \jjok\XmlSitemap\Sitemap::addUrl
	 *  @covers \jjok\XmlSitemap\Sitemap::toString
	 */
	public function testSimpleUrlCanBeAdded() {
		$sitemap = new Sitemap();
		$sitemap->addUrl(new Url('blah'));
	
		$this->assertXmlStringEqualsXmlString('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"><url><loc>blah</loc></url></urlset>', $sitemap->toString());
	}

	/**
	 *  @covers \jjok\XmlSitemap\Sitemap::addUrl
	 *  @covers \jjok\XmlSitemap\Sitemap::toString
	 */
	public function testFullUrlCanBeAdded() {
		$sitemap = new Sitemap();
		$sitemap->addUrl(new Url('blah', 0.5, '2012-12-17', 'never'));
	
		$this->assertXmlStringEqualsXmlString('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"><url><loc>blah</loc><lastmod>2012-12-17</lastmod><changefreq>never</changefreq><priority>0.5</priority></url></urlset>', $sitemap->toString());
	}
	
	/**
	 *  @covers \jjok\XmlSitemap\Sitemap::addUrl
	 *  @covers \jjok\XmlSitemap\Sitemap::toString
	 */
	public function testMultipleUrlsCanBeAdded() {
		$sitemap = new Sitemap();
		$sitemap->addUrl(new Url('blah1'));
		$sitemap->addUrl(new Url('blah2'));
		$sitemap->addUrl(new Url('blah3'));
	
		$this->assertXmlStringEqualsXmlString('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"><url><loc>blah1</loc></url><url><loc>blah2</loc></url><url><loc>blah3</loc></url></urlset>', $sitemap->toString());
	}
	
	/**
	 *  @covers \jjok\XmlSitemap\Sitemap::setStylesheet
	 *  @covers \jjok\XmlSitemap\Sitemap::toString
	 */
	public function testStylesheetCanBeAdded() {
		$sitemap = new Sitemap();
		$sitemap->setStylesheet('some-xsl-stylesheet');
		
		$this->assertXmlStringEqualsXmlString('<?xml-stylesheet type="text/xsl" href="some-xsl-stylesheet" ?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" />', $sitemap->toString());
	}
}

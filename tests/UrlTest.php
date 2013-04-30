<?php

require_once 'src/jjok/XmlSitemap/Url.php';

use \jjok\XmlSitemap\Url;

class UrlTest extends PHPUnit_Framework_TestCase {

	/**
	 * 
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testLocationIsRequired() {
		$url = new Url();
	}

	/**
	 *  @covers \jjok\XmlSitemap\Url::__construct
	 *  @covers \jjok\XmlSitemap\Url::getLoc
	 */
	public function testLocationCanBeSet() {
		$url = new Url('some URL');

		$this->assertSame('some URL', $url->getLoc());
		$this->assertNull($url->getLastMod());
		$this->assertNull($url->getChangeFreq());
		$this->assertNull($url->getPriority());
	}

	/**
	 *  @covers \jjok\XmlSitemap\Url::__construct
	 *  @covers \jjok\XmlSitemap\Url::getPriority
	 */
	public function testPriorityCanBeSet() {
		$url = new Url('http://example.com/qwerty/blah/', 0.6);

		$this->assertSame('http://example.com/qwerty/blah/', $url->getLoc());
		$this->assertSame(0.6, $url->getPriority());
		$this->assertNull($url->getLastMod());
		$this->assertNull($url->getChangeFreq());
	}

	/**
	 *  @covers \jjok\XmlSitemap\Url::__construct
	 *  @covers \jjok\XmlSitemap\Url::getLastMod
	 */
	public function testLastModCanBeSet() {
		$url = new Url('http://www.example.com/some_page.html', null, '2012-12-17');

		$this->assertSame('http://www.example.com/some_page.html', $url->getLoc());
		$this->assertNull($url->getPriority());
		$this->assertSame('2012-12-17', $url->getLastMod());
		$this->assertNull($url->getChangeFreq());
	}

	/**
	 *  @covers \jjok\XmlSitemap\Url::__construct
	 *  @covers \jjok\XmlSitemap\Url::getChangeFreq
	 */
	public function testChangeFrequencyCanBeSet() {
		$url = new Url('http://www.example.com/qwerty/some_page.html', null, null, 'monthly');

		$this->assertSame('http://www.example.com/qwerty/some_page.html', $url->getLoc());
		$this->assertNull($url->getPriority());
		$this->assertNull($url->getLastMod());
		$this->assertSame('monthly', $url->getChangeFreq());
	}
}

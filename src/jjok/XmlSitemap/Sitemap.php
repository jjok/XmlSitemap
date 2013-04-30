<?php

/**
 * Copyright (c) 2013 Jonathan Jefferies
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to
 * deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
 * sell copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 * IN THE SOFTWARE.
 */

namespace jjok\XmlSitemap;

/**
 * An XML sitemap.
 * @package jjok\XmlSitemap
 * @author Jonathan Jefferies (jjok)
 * @version 1.0.0
 * @see http://www.sitemaps.org/
 */
class Sitemap {

	/**
	 * The URLs added to the sitemap.
	 * @var Url[]
	 */
	protected $urlset = array();

	/**
	 * An XSL stylesheet associated with the sitemap.
	 * @var string
	 */
	protected $stylesheet = '';

	/**
	 * Add a URL to the sitemap.
	 * @param Url $url
	 */
	public function addUrl(Url $url) {
		$this->urlset[] = $url;
	}

	/**
	 * 
	 * @param string $value
	 */
	public function setStylesheet($value) {
		$this->stylesheet = $value;
	}

	/**
	 * 
	 * @return string
	 */
	public function toString() {
		
		$xml = new \DOMDocument('1.0', 'UTF-8');

		if($this->stylesheet != '') {
			$xsl = $xml->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="'.$this->stylesheet.'" ');
			$xml->appendChild($xsl);
		}

		$urlset = $xml->appendChild($xml->createElement('urlset'));
		$urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
		
		foreach($this->urlset as $url) {

			$url_el = $urlset->appendChild($xml->createElement('url'));

			$url_el->appendChild($xml->createElement('loc', $url->getLoc()));
			
			if($url->getLastMod() !== null) {
				$url_el->appendChild($xml->createElement('lastmod', $url->getLastMod()));
			}
			if($url->getChangeFreq() !== null) {
				$url_el->appendChild($xml->createElement('changefreq', $url->getChangeFreq()));
			}
			if($url->getPriority() !== null) {
				$url_el->appendChild($xml->createElement('priority', $url->getPriority()));
			}
		}
		
		return $xml->saveXML();
	}
}

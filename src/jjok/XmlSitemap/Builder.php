<?php

namespace jjok\XmlSitemap;

use DOMDocument;

/**
 * 
 * @author Jonathan Jefferies
 *
 */
class Builder {
	
	/**
	 * 
	 * @var DOMDocument
	 */
	protected $xml;
	
	/**
	 * 
	 * @param DOMDocument $xml
	 */
	public function __construct(DOMDocument $xml) {
		$this->xml = $xml;
	}
	
	/**
	 * Convert a Sitemap to XML.
	 * @param Sitemap $sitemap
	 * @return DOMDocument
	 */
	public function sitemapToXML(Sitemap $sitemap) {
		
		if($sitemap->getStylesheet() != '') {
			$this->xml->appendChild($this->xml->createProcessingInstruction(
				'xml-stylesheet',
				sprintf('type="text/xsl" href="%s" ', $sitemap->getStylesheet())
			));
		}
		
		$urlset = $this->xml->appendChild($this->xml->createElement('urlset'));
		$urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
		$urlset->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
		$urlset->setAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');
		
		foreach($sitemap->getUrlset() as $url) {
			$urlset->appendChild($this->urlToXML($url));
		}
		
		return $this->xml;
	}
	
	/**
	 * Convert a Url to XML.
	 * @param Url $url
	 * @return \DOMElement
	 */
	public function urlToXML(Url $url) {
		
		$url_el = $this->xml->createElement('url');
		
		$url_el->appendChild($this->xml->createElement('loc', $url->getLoc()));
			
		if($url->getLastMod() !== null) {
			$url_el->appendChild($this->xml->createElement('lastmod', $url->getLastMod()));
		}
		if($url->getChangeFreq() !== null) {
			$url_el->appendChild($this->xml->createElement('changefreq', $url->getChangeFreq()));
		}
		if($url->getPriority() !== null) {
			$url_el->appendChild($this->xml->createElement('priority', $url->getPriority()));
		}
		
		return $url_el;
	}
}

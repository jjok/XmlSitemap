<?php

namespace jjok\XmlSitemap;

/**
 * 
 * @author Jonathan Jefferies
 * @see http://www.sitemaps.org/protocol.html#sitemapIndex_sitemapindex
 */
class Index {
	
	/**
	 * 
	 * @var array
	 */
	protected $sitemaps = array();
	
	public function getSitemaps() {
		return $this->sitemaps;
	}
	
	public function addSitemap($loc) {
		$this->sitemaps[] = $loc;
	}
	
	public function length() {
		return count($this->sitemaps);
	}
}

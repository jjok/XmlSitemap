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
 * A sitemap URL entry.
 * @package jjok\XmlSitemap
 * @author Jonathan Jefferies (jjok)
 * @version 1.0.0
 * @see http://www.sitemaps.org/protocol.html#urldef
 */
class Url {

	/**
	 * The URL.
	 * @see http://www.sitemaps.org/protocol.html#locdef
	 * @var string
	 */
	private $loc;

	/**
	 * The priority of this URL relative to other URLs on the site.
	 * @see http://www.sitemaps.org/protocol.html#prioritydef
	 * @var float
	 */
	private $priority;

	/**
	 * The date of last modification of the file.
	 * @see http://www.sitemaps.org/protocol.html#lastmoddef
	 * @var string
	 */
	private $lastmod;

	/**
	 * How frequently the page is likely to change.
	 * @see http://www.sitemaps.org/protocol.html#changefreqdef
	 * @var string
	 */
	private $changefreq;

	/**
	 * Set the URL properties.
	 * @param string $loc
	 * @param string $lastmod
	 * @param string $changefreq
	 * @param float $priority
	 */
	public function __construct($loc, $priority = null, $lastmod = null, $changefreq = null) {
		$this->loc = $loc;
		$this->priority = $priority;
		$this->lastmod = $lastmod;
		$this->changefreq = $changefreq;
	}

	/**
	 * Get the URL.
	 * @return string
	 */
	public function getLoc() {
		return $this->loc;
	}

	/**
	 * Get the priority of the URL.
	 * @return unknown
	 */
	public function getPriority() {
		return $this->priority;
	}

	/**
	 * Get the last modification date.
	 * @return string
	 */
	public function getLastMod() {
		return $this->lastmod;
	}

	/**
	 * Get the change frequency.
	 * @return string
	 */
	public function getChangeFreq() {
		return $this->changefreq;
	}
}

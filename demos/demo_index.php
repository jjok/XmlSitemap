<?php


use jjok\XmlSitemap\Builder;
use jjok\XmlSitemap\Index;

require '../src/jjok/XmlSitemap/Builder.php';
require '../src/jjok/XmlSitemap/Index.php';

$index = new Index();
$index->addSitemap('http://example.com/sitemap.xml');

$builder = new Builder();
echo $builder->indexToXML($index)->saveXML();

<?php
require_once 'vendor/autoload.php';

$es = Elasticsearch\ClientBuilder::create()->build(['hosts' => ['127.0.0.1:9200']]);
?>
<?php
 $xml_file = $_GET['xml_file'];
 $feed = new DOMDocument();
 $feed->load($xml_file);
 $json = array();
 $json['title'] = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('title')->item(0)->firstChild->nodeValue;
 $json['description'] = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('description')->item(0)->firstChild->nodeValue;
 //$json['link'] = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('link')->item(0)->firstChild->nodeValue;
 $items = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('item');

 $json['items'] = array();
 $i = 0;

 foreach($items as $key => $item) {
 $title = $item->getElementsByTagName('title')->item(0)->firstChild->nodeValue;
 $description = $item->getElementsByTagName('description')->item(0)->firstChild->nodeValue;
 $pubDate = $item->getElementsByTagName('pubDate')->item(0)->firstChild->nodeValue;
 $link = $item->getElementsByTagName('link')->item(0)->firstChild->nodeValue;
 $description = strip_tags($description);

 $json['items'][$key]['title'] = $title;
 $json['items'][$key]['description'] = $description;
 $json['items'][$key]['pubDate'] = $pubDate;
 $json['items'][$key]['link'] = $link; 
 }

echo json_encode($json);

?>
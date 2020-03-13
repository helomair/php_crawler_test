<?php

$url = "https://titangene.github.io/article/flutter-install-on-windows.html";

$dom = new DOMDocument('1.0');
@$dom->loadHTMLFile($url);

$anchors = $dom->getElementsByTagName('a');
foreach ($anchors as $element) {
    $href = $element->getAttribute('href');
    if (0 !== strpos($href, 'http')) {
        $path = '/' . ltrim($href, '/');
        if (extension_loaded('http')) {
            $href = http_build_url($url, array('path' => $path));
        } else {
            $parts = parse_url($url);
            print_r($parts);
            $href = $parts['scheme'] . '://';
            if (isset($parts['user']) && isset($parts['pass'])) {
                $href .= $parts['user'] . ':' . $parts['pass'] . '@';
            }
            $href .= $parts['host'];
            if (isset($parts['port'])) {
                $href .= ':' . $parts['port'];
            }
            $href .= dirname($parts['path'], 1).$path;
            echo $path . "\n";
            echo $href . "\n";
        }
    // break;
    }
    //crawl_page($href, $depth - 1);
}
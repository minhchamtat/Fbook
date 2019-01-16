<?php

function bannerImg()
{
    $context = stream_context_create(['http' => ['header' => 'Connection: close\r\n']]);
    $url = 'https://viblo.asia/';
    $start = config('view.start');
    $matchLeng = config('view.maxBanner');
    $content = file_get_contents($url, false, $context, $start, $matchLeng);
    $data = preg_match('/<div class="container px-0"><img src="(.*?)"/is', $content, $match);
    if (isset($match[1])) {
        return $match[1];
    } else {
        return null;
    }
}

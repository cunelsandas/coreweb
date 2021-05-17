<?php
function getDomains(){
    /** @var TYPE_NAME $domains */
    $webURL = url('/');
    $parse = parse_url($webURL);
    $parseURL = $parse['host'];   //check url parse http and www

    $webname = Dashboard::all()
        ->where('domain_name','=',$parseURL);

    $webname = $webname->toArray('name');

    $domains = Dashboard::all()
        ->where('domain_name','=',$parseURL)
        ->sortKeysDesc();
    return $domains;
}

<?php
function getCss(){
    /** @var TYPE_NAME $css */
    $css = db2()->table('settings')->get()->first();
    return $css;
}

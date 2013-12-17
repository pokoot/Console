<?php

namespace Goldfinger;

interface Command
{
    public function log($content);
    public function error($content);
    public function warn($content);
    public function count($content);
    public function header($content, $color, $background);
    public function show();
}

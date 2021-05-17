<?php

foreach (glob('src/Globals/**/*.php') as $file) {
    require_once($file);
}

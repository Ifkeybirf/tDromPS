<?php

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

class DriverUtil
{
    static $desired_capabilities;

    static public function getDriver()
    {
        $host = 'http://localhost:4444/wd/hub';
        self::$desired_capabilities = DesiredCapabilities::chrome();

        return RemoteWebDriver::create($host, self::$desired_capabilities);
    }
}

<?php
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class SearchResultsPage{

    private $driver;
    private $linksearchtext;

    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
    }

    public function isResultPresent($str){

        $this->linksearchtext = WebDriverBy::partialLinkText($str);
        return $this->driver->findElement($this->linksearchtext)->isDisplayed();
    }
}

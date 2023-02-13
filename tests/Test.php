<?php
require __DIR__ .'/../vendor/autoload.php';
include __DIR__ . '/../pageobjects/DromSearchPage.php';
include __DIR__.'/../pageobjects/SearchResultsPage.php';
include __DIR__.'/../driverutil/DriverUtil.php';
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    protected $webDriver;
    protected $url = 'https://www.drom.ru';
    protected $dromhomepage;
    protected $searchresultspage;
    const SEARCH_STRING = 'Toyota Harrier';

    public function setUp(): void
    {
        $this->webDriver = DriverUtil::getDriver();
        $this->dromhomepage = new DromSearchPage($this->webDriver);
        $this->searchresultspage = new SearchResultsPage($this->webDriver);
    }

    public function testDromHome()
    {
        $this->dromhomepage->openURL();
        $this->assertFalse($this->dromhomepage->pageContains(self::SEARCH_STRING));

        $this->dromhomepage->setSearchYearFrom();
        $this->dromhomepage->searchFor('2007');

    }

    public function testDromSearch()
    {
        $this->dromhomepage->openURL();
        $this->dromhomepage->searchFor(self::SEARCH_STRING);
        $this->assertTrue($this->searchresultspage->isResultPresent(), self::SEARCH_STRING .' << Result Found');
    }

    public function tearDown(): void
    {
    //    $this->webDriver->quit();
    }

}


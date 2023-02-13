<?php
use Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverKeys;
use Facebook\WebDriver\WebDriverBy;

class DromSearchPage {

    private $url = 'https://auto.drom.ru/toyota/harrier/';
    private $driver;
    private $searchbox;
    private $srchbtn;

    private $searchYearFromBtn;
    private $searchYearFromVal;


    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
/*        $this->searchbox = WebDriverBy::id('lst-ib');
        $this->searchbox = WebDriverBy::xpath('//*[@id="text"] ');

        $this->searchYearFromBtn = WebDriverBy::partialLinkText('Год от');
        $this->searchYearFromBtn->click();
        $this->searchYearFromVal = WebDriverBy::
*/
        $this->srchbtn = WebDriverBy::xpath('/html/body/div[2]/div[4]/div[1]/div[1]/div[2]/form/div/div[4]/div[3]/button/div');

    }

    public function openURL(){
        $this->driver->get($this->url);
    }

    public function title(){
        return $this->driver->getTitle();
    }

    public function setSearchYearFrom($year){
        $searchYearFromBtn = $this->driver->findElement('sales__filter_year-from');
        $searchYearFromBtn->click();
        $searchYearFromList = $this->driver->findElement('id=q1xg5e7nsfse-18');
        $searchYearFromList->click();

    }

    public function pageContains(string $str){
//        $list = $this->driver->findElement(WebDriverBy::xpath("//*[contains(text(), $str)]"));
        $list = $this->driver->findElement(WebDriverBy::xpath("/html/body/div[2]/div[3]/h1"));

        var_dump($list);
        //return (strlen($list->getAttribute("value")) > 0);
        return ($list->getText() == $str);
    }

/*
    public function searchFor($searchterm){
        $this->driver->findElement($this->searchbox)->sendKeys($searchterm);
        $this->driver->getKeyboard()->pressKey(WebDriverKeys::ENTER);
    }
*/
    public function runSearch(){
        $this->srchbtn->click();
    }

}
<?php

/**
 * User: vinnyfs89
 * Date: 29/07/16
 * Time: 19:34
 */
class PHPDuinoTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function testCreateObject()
    {
        $this->assertInstanceOf('\PHPDuino\PHPDuino', new \PHPDuino\PHPDuino("/dev/cu.usbmodem1411"), "Invalid Instance of Class PHPDuino");
        $this->setExpectedException('\PHPDuino\PHPDuinoException', "Parameter '\$accessPort' can not be empty.");
        new \PHPDuino\PHPDuino(" ");
        $this->assertEquals('\PHPDuino\PHPDuinoException', $this->getExpectedException());
    }

    public function testChangeAccessPort()
    {
        $objPHPDuino = new \PHPDuino\PHPDuino("/dev/cu.usbmodem1411");
        $this->assertEquals(true, $objPHPDuino->changeAccessPort("/dev/cu.usbmodem1421"), "Value of Access Port has not been changed.");
    }

    public function testChangeSpeedPort()
    {
        $objPHPDuino = new \PHPDuino\PHPDuino("/dev/cu.usbmodem1411", 16000);
        $this->assertEquals(true, $objPHPDuino->changeSpeedPort(16000), "Value of Speed Port has not been changed.");
    }

    public function testSendContent()
    {
        $objPHPDuino = new \PHPDuino\PHPDuino("/dev/cu.usbmodem1411");
        $this->assertEquals(true, $objPHPDuino->sendContentToDevice("hello"), "The content was not sent.");
    }

    public function testReceiveContent()
    {
        $objPHPDuino = new \PHPDuino\PHPDuino("/dev/cu.usbmodem1411");
        $this->assertNotEmpty($objPHPDuino->getContentFromDevice(), "No content was returned from device.");
    }
}

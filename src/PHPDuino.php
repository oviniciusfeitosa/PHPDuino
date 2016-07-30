<?php

namespace PHPDuino;

use Exception;

/**
 * User: vinnyfs89
 * Date: 29/07/16
 * Time: 18:31
 */
class PHPDuino
{
    private $accessPort;

    private $speedPort;

    public function __construct($accessPort, $speedPort = 9600)
    {

        if (trim($accessPort) == "" || empty($accessPort)) throw new PHPDuinoException("Parameter '\$accessPort' can not be empty.");
        $this->accessPort = $accessPort;
        $this->speedPort = $speedPort;
        $this->syncSpeedPort();
    }

    /**
     * @return array
     * @throws PHPDuinoException
     */
    public function syncSpeedPort()
    {
        try {
            exec("sudo stty {$this->speedPort} < {$this->accessPort}");
            return true;
        } catch (Exception $objException) {
            throw new PHPDuinoException($objException->getMessage(), $objException->getCode(), $objException);
        }
    }

    /**
     * @param string $accessPort
     * @return bool
     */
    public function changeAccessPort($accessPort)
    {
        $this->accessPort = $accessPort;
        return $this->syncSpeedPort();
    }

    /**
     * @param int $speedPort
     * @return bool
     */
    public function changeSpeedPort($speedPort)
    {
        $this->speedPort = $speedPort;
        return $this->syncSpeedPort();
    }

    /**
     * @param string|int $content
     * @return bool
     * @throws PHPDuinoException
     */
    public function sendContentToDevice($content)
    {
        try {
            file_put_contents($this->accessPort, $content);
            return true;
        } catch (Exception $objException) {
            throw new PHPDuinoException($objException->getMessage(), $objException->getCode(), $objException);
        }
    }

    /**
     * @return string
     * @throws PHPDuinoException
     */
    public function getContentFromDevice()
    {
        try {
            return file_get_contents($this->accessPort);
        } catch (Exception $objException) {
            throw new PHPDuinoException($objException->getMessage(), $objException->getCode(), $objException);
        }
    }

}
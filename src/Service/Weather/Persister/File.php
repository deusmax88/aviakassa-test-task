<?php
namespace Service\Weather\Persister;

use Service\Weather\IPersister;

class File implements IPersister
{
    /**
     * @var string
     */
    protected $fileName;

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName($fileName): void
    {
        $this->fileName = $fileName;
    }

    public function persist($buffer)
    {
        if (!$this->fileName) {
            throw new \Exception("fileName for persisting not set");
        }

        file_put_contents($this->fileName, $buffer);
    }
}
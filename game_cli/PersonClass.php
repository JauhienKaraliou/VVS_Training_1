<?php

class Person
{

    protected $currentX;

    protected $currentY;

    protected $previousX;

    protected $previousY;

    protected $symbol;

    protected $colour;

    /**
     * @return mixed
     */
    public function getCurrentX()
    {
        return $this->currentX;
    }

    /**
     * @param mixed $currentX
     */
    public function setCurrentX($currentX)
    {
        $this->currentX = $currentX;
    }

    /**
     * @return mixed
     */
    public function getCurrentY()
    {
        return $this->currentY;
    }

    /**
     * @param mixed $currentY
     */
    public function setCurrentY($currentY)
    {
        $this->currentY = $currentY;
    }

    /**
     * @return mixed
     */
    public function getPreviousX()
    {
        return $this->previousX;
    }

    /**
     * @param mixed $previousX
     */
    public function setPreviousX($previousX)
    {
        $this->previousX = $previousX;
    }

    /**
     * @return mixed
     */
    public function getPreviousY()
    {
        return $this->previousY;
    }

    /**
     * @param mixed $previousY
     */
    public function setPreviousY($previousY)
    {
        $this->previousY = $previousY;
    }

    /**
     * @return mixed
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param mixed $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @return mixed
     */
    public function getColour()
    {
        return $this->colour;
    }

    /**
     * @param mixed $colour
     */
    public function setColour($colour)
    {
        $this->colour = $colour;
    }

    public function moveUp()
    {
        $this->setPreviousState();
        $this->setCurrentY($this->getCurrentY()-1);
    }

    public function moveDown()
    {
        $this->setPreviousState();
        $this->setCurrentY($this->getCurrentY()+1);
    }

    public function moveLeft()
    {
        $this->setPreviousState();
        $this->setCurrentX($this->getCurrentX()-1);
    }

    public function moveRight()
    {
        $this->setPreviousState();
        $this->setCurrentX($this->getCurrentX()+1);
    }

    public function setPreviousState()
    {
        $this->setPreviousX($this->getCurrentX());
        $this->setPreviousY($this->getCurrentY());
    }
}
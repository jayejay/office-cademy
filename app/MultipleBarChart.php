<?php

namespace App;


class MultipleBarChart
{
    protected $xStartPositionFirstBar;
    protected $xStartPositionSecondBar;
    protected $yStartPosition;
    protected $horizontalMaxPosition;
    protected $totalBarCount;

    public function __construct($xStartPositionFirstBar, $xStartPositionSecondBar, $horizontalMaxPosition,
                                $yStartPosition, $totalBarCount)
    {
        $this->xStartPositionFirstBar = $xStartPositionFirstBar;
        $this->xStartPositionSecondBar = $xStartPositionSecondBar;
        $this->yStartPosition = $yStartPosition;
        $this->totalBarCount = $totalBarCount;
        $this->horizontalMaxPosition = $horizontalMaxPosition;
    }

    public function setVerticalStartPosition($yStartPosition)
    {
        $this->yStartPosition = $yStartPosition;
    }

    public function getVerticalStartPosition()
    {
        return $this->yStartPosition;
    }

    public function setHorizontalStartPositionFirstBar($xStartPositionFirstBar)
    {
        $this->xStartPositionFirstBar = $xStartPositionFirstBar;
    }

    public function getHorizontalStartPositionFirstBar()
    {
        return $this->xStartPositionFirstBar;
    }

    public function setHorizontalStartPositionSecondBar($xStartPosition)
    {
        $this->xStartPositionSecondBar = $xStartPosition;
    }

    public function getHorizontalStartPositionSecondBar()
    {
        return $this->xStartPositionSecondBar;
    }

    public function getHorizontalDelta()
    {
        return $this->horizontalMaxPosition / $this->totalBarCount;
    }

    public function getHorizontalLabelStart()
    {
        return ($this->xStartPositionFirstBar + $this->xStartPositionSecondBar) / 2;
    }

    /**
     * @return mixed
     */
    public function getGridVerticalPositions()
    {
        $gridDelta = $this->getVerticalStartPosition() / $this->totalBarCount;
        $sub = 0;
        $gridVerticalPositions = [];

        for ($i = 1; $i <= $this->totalBarCount; $i++) {
            $gridVerticalPositions[$i] = $this->getVerticalStartPosition() - $sub;
            $sub += $gridDelta;
        }

        return $gridVerticalPositions;
    }
}
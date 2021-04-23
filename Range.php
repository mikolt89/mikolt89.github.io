<?php
class Range {
  private static $average;
  private $rangevalue;
  /**
   * Get the value of average
   */ 
  public function getAverage()
  {
    return $this->average;
  }

  /**
   * Set the value of average
   *
   * @return  self
   */ 
  public function setAverage($average)
  {
    $this->average = $average;

    return $this;
  }

  /**
   * Get the value of rangevalue
   */ 
  public function getRangevalue()
  {
    return $this->rangevalue;
  }

  /**
   * Set the value of rangevalue
   *
   * @return  self
   */ 
  public function setRangevalue($rangevalue)
  {
    $this->rangevalue = $rangevalue;

    return $this;
  }
}
?>
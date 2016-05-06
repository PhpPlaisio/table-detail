<?php
//----------------------------------------------------------------------------------------------------------------------
use SetBased\Abc\Table\DetailTable;
use SetBased\Abc\Table\TableRow\DateTimeTableRow;

//----------------------------------------------------------------------------------------------------------------------
class DateTimeTableRowTest extends PHPUnit_Framework_TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an empty datetime.
   */
  public function testEmptyDateTime1()
  {
    $table = new DetailTable();
    DateTimeTableRow::addRow($table, 'EmptyDateTime1', '');
    $html = $table->getHtmlTable();

    $this->assertContains('<td></td>', $html);
    $this->assertContains('<th>EmptyDateTime1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an invalid date.
   */
  public function testInvalidDateTime1()
  {
    $table = new DetailTable();
    DateTimeTableRow::addRow($table, 'InvalidDateTime1', 'not a datetime');
    $html = $table->getHtmlTable();

    $this->assertContains('<td>not a datetime</td>', $html);
    $this->assertContains('<th>InvalidDateTime1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a valid date.
   */
  public function testValidDateTime1()
  {
    $table = new DetailTable();
    DateTimeTableRow::addRow($table, 'ValidDateTime1', '2004-07-13 12:13:14', 'l jS \of F Y h:i:s A');
    $html = $table->getHtmlTable();

    $this->assertContains('<td class="date" data-value="2004-07-13 12:13:14">Tuesday 13th of July 2004 12:13:14 PM</td>', $html);
    $this->assertContains('<th>ValidDateTime1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

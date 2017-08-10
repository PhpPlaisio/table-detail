<?php
//----------------------------------------------------------------------------------------------------------------------
use PHPUnit\Framework\TestCase;
use SetBased\Abc\Table\DetailTable;
use SetBased\Abc\Table\TableRow\DateTableRow;

class DateTableRowTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an empty date.
   */
  public function testEmptyDate1()
  {
    $table = new DetailTable();
    DateTableRow::addRow($table, 'EmptyDate1', '');
    $html = $table->getHtmlTable();

    self::assertContains('<td></td>', $html);
    self::assertContains('<th>EmptyDate1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an invalid date.
   */
  public function testInvalidDate1()
  {
    $table = new DetailTable();
    DateTableRow::addRow($table, 'InvalidDate1', 'not a date');
    $html = $table->getHtmlTable();

    self::assertContains('<td>not a date</td>', $html);
    self::assertContains('<th>InvalidDate1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an open date.
   */
  public function testOpenEndDate1()
  {
    $table = new DetailTable();
    DateTableRow::addRow($table, 'OpenEndDate1', '9999-12-31');
    $html = $table->getHtmlTable();

    self::assertContains('<td></td>', $html);
    self::assertContains('<th>OpenEndDate1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an custom open date.
   */
  public function testOpenEndDate2()
  {
    DateTableRow::$openDate = '8888-88-88';

    $table = new DetailTable();
    DateTableRow::addRow($table, 'OpenEndDate2', '8888-88-88');
    $html = $table->getHtmlTable();

    self::assertContains('<td></td>', $html);
    self::assertContains('<th>OpenEndDate2</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a valid date.
   */
  public function testValidDate1()
  {
    $table = new DetailTable();
    DateTableRow::addRow($table, 'ValidDate1', '2004-07-13', 'l jS \of F Y');
    $html = $table->getHtmlTable();

    self::assertContains('<td class="date" data-value="2004-07-13">Tuesday 13th of July 2004</td>', $html);
    self::assertContains('<th>ValidDate1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
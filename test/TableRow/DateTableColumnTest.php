<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Plaisio\Table\DetailTable;
use Plaisio\Table\TableRow\DateTableRow;

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

    self::assertStringContainsString('<td class="dt dt-cell dt-date"></td>', $html);
    self::assertStringContainsString('<th class="dt dt-header">EmptyDate1</th>', $html);
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

    self::assertStringContainsString('<td class="dt dt-cell dt-date">not a date</td>', $html);
    self::assertStringContainsString('<th class="dt dt-header">InvalidDate1</th>', $html);
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

    self::assertStringContainsString('<td class="dt dt-cell dt-date"></td>', $html);
    self::assertStringContainsString('<th class="dt dt-header">OpenEndDate1</th>', $html);
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

    self::assertStringContainsString('<td class="dt dt-cell dt-date"></td>', $html);
    self::assertStringContainsString('<th class="dt dt-header">OpenEndDate2</th>', $html);
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

    self::assertStringContainsString('<td class="dt dt-cell dt-date" data-value="2004-07-13">Tuesday 13th of July 2004</td>', $html);
    self::assertStringContainsString('<th class="dt dt-header">ValidDate1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

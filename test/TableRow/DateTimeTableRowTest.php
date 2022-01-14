<?php
declare(strict_types=1);

namespace Plaisio\Table\Test\TableRow;

use PHPUnit\Framework\TestCase;
use Plaisio\Table\DetailTable;
use Plaisio\Table\TableRow\DateTimeTableRow;

class DateTimeTableRowTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an empty datetime.
   */
  public function testEmptyDateTime1()
  {
    $table = new DetailTable();
    DateTimeTableRow::addRow($table, 'EmptyDateTime1', '');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-datetime"></td>', $html);
    self::assertStringContainsString('<th class="dt-header">EmptyDateTime1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an invalid date.
   */
  public function testInvalidDateTime1()
  {
    $table = new DetailTable();
    DateTimeTableRow::addRow($table, 'InvalidDateTime1', 'not a datetime');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-datetime">not a datetime</td>', $html);
    self::assertStringContainsString('<th class="dt-header">InvalidDateTime1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a valid date.
   */
  public function testValidDateTime1()
  {
    $table = new DetailTable();
    DateTimeTableRow::addRow($table, 'ValidDateTime1', '2004-07-13 12:13:14', 'l jS \of F Y h:i:s A');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-datetime" data-value="2004-07-13 12:13:14">Tuesday 13th of July 2004 12:13:14 PM</td>', $html);
    self::assertStringContainsString('<th class="dt-header">ValidDateTime1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

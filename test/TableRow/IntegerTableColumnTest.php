<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SetBased\Abc\Table\DetailTable;
use SetBased\Abc\Table\TableRow\IntegerTableRow;

class IntegerTableRowTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with null.
   */
  public function testEmptyInteger1()
  {
    $table = new DetailTable();
    IntegerTableRow::addRow($table, 'EmptyInteger1', null);
    $html = $table->getHtmlTable();

    self::assertStringContainsString('<td></td>', $html);
    self::assertStringContainsString('<th>EmptyInteger1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an integer.
   */
  public function testValidInteger1()
  {
    $table = new DetailTable();
    IntegerTableRow::addRow($table, 'ValidInteger1', 123456);
    $html = $table->getHtmlTable();

    self::assertStringContainsString('<td class="integer">123456</td>', $html);
    self::assertStringContainsString('<th>ValidInteger1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

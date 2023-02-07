<?php
declare(strict_types=1);

namespace Plaisio\Table\Test\TableRow;

use PHPUnit\Framework\TestCase;
use Plaisio\Table\DetailTable;
use Plaisio\Table\TableRow\IntegerTableRow;

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
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-cell-integer"></td>', $html);
    self::assertStringContainsString('<th class="dt-header">EmptyInteger1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an integer.
   */
  public function testValidInteger1()
  {
    $table = new DetailTable();
    IntegerTableRow::addRow($table, 'ValidInteger1', 123456);
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-cell-integer">123456</td>', $html);
    self::assertStringContainsString('<th class="dt-header">ValidInteger1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

<?php
declare(strict_types=1);

namespace Plaisio\Table\Test;

use PHPUnit\Framework\TestCase;
use Plaisio\Table\DetailTable;
use Plaisio\Table\TableRow\TextTableRow;

/**
 * Test cases for class DetailTable.
 */
class DetailTableTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Simple test for DetailTable.
   */
  public function testDetailTable(): void
  {
    $table = new DetailTable();

    TextTableRow::addRow($table, 'Header1', 'cell1');

    $html = $table->htmlTable();

    self::assertSame('<table class="dt-table"><tbody class="dt-body"><tr class="dt-row"><th class="dt-header">Header1</th><td class="dt-cell dt-cell-text">cell1</td></tr></tbody></table>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

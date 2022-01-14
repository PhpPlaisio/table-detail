<?php
declare(strict_types=1);

namespace Plaisio\Table\Test\TableRow;

use PHPUnit\Framework\TestCase;
use Plaisio\Table\DetailTable;
use Plaisio\Table\TableRow\EmailTableRow;

class EmailTableRowTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an empty datetime.
   */
  public function testEmptyEmail1()
  {
    $table = new DetailTable();
    EmailTableRow::addRow($table, 'EmptyEmail1', '');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-email"></td>', $html);
    self::assertStringContainsString('<th class="dt-header">EmptyEmail1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a valid date.
   */
  public function testValidEmail1()
  {
    $table = new DetailTable();
    EmailTableRow::addRow($table, 'ValidEmail1', 'info@setbased.nl');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-email">'.
                                     '<a class="link link-mailto" href="mailto:info@setbased.nl">info@setbased.nl</a>'.
                                     '</td>', $html);
    self::assertStringContainsString('<th class="dt-header">ValidEmail1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

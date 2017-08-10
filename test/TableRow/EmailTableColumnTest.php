<?php
//----------------------------------------------------------------------------------------------------------------------
use PHPUnit\Framework\TestCase;
use SetBased\Abc\Table\DetailTable;
use SetBased\Abc\Table\TableRow\EmailTableRow;

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
    $html = $table->getHtmlTable();

    self::assertContains('<td></td>', $html);
    self::assertContains('<th>EmptyEmail1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a valid date.
   */
  public function testValidEmail1()
  {
    $table = new DetailTable();
    EmailTableRow::addRow($table, 'ValidEmail1', 'info@setbased.nl');
    $html = $table->getHtmlTable();

    self::assertContains('<td class="email"><a href="mailto:info@setbased.nl">info@setbased.nl</a></td>', $html);
    self::assertContains('<th>ValidEmail1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

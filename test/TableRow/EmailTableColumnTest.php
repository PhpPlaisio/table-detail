<?php
//----------------------------------------------------------------------------------------------------------------------
use SetBased\Abc\Table\DetailTable;
use SetBased\Abc\Table\TableRow\EmailTableRow;

//----------------------------------------------------------------------------------------------------------------------
class EmailTableRowTest extends PHPUnit_Framework_TestCase
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

    $this->assertContains('<td></td>', $html);
    $this->assertContains('<th>EmptyEmail1</th>', $html);
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

    $this->assertContains('<td class="email"><a href="mailto:info@setbased.nl">info@setbased.nl</a></td>', $html);
    $this->assertContains('<th>ValidEmail1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Table\DetailTable;

//----------------------------------------------------------------------------------------------------------------------
/**
 * Table row in a detail table with plain text.
 */
class TextTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a text value to a detail table.
   *
   * @param DetailTable $table  The detail table.
   * @param int|string  $header The row header text or word ID.
   * @param string      $text   The text.
   */
  public static function addRow($table, $header, $text)
  {
    $table->addRow($header, ['class' => 'text'], $text);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Helper\Html;
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
   * @param DetailTable $table  The (detail) table.
   * @param string      $header The row header text.
   * @param string      $text   The text.
   */
  public static function addRow($table, $header, $text)
  {
    $row = '<tr><th>';
    $row .= Html::txt2Html($header);
    $row .= '</th><td class="text">';
    $row .= Html::txt2Html($text);
    $row .= '</td></tr>';

    $table->addRow($row);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

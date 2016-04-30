<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Helper\Html;
use SetBased\Abc\Table\DetailTable;

//----------------------------------------------------------------------------------------------------------------------
/**
 * Table row in a detail table with a number.
 */
class NumericTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a numeric value to a detail table.
   *
   * @param DetailTable $table  The (detail) table.
   * @param string      $header The row header text.
   * @param string      $value  The text.
   * @param string      $format The formatting string (see sprintf).
   */
  public static function addRow($table, $header, $value, $format)
  {
    $row = '<tr><th>';
    $row .= Html::txt2Html($header);
    $row .= '</th><td class="number">';
    if ($value!==null && $value!==false && $value!=='')
    {
      $row .= Html::txt2Html(sprintf($format, $value));
    }
    $row .= '</td></tr>';

    $table->addRow($row);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

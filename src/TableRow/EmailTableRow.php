<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Helper\Html;
use SetBased\Abc\Table\DetailTable;

//----------------------------------------------------------------------------------------------------------------------
/**
 * Table row in a detail table with aa email address.
 */
class EmailTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a email address to a detail table.
   *
   * @param DetailTable $table  The (detail) table.
   * @param string      $header The row header text.
   * @param string      $value  The email address.
   */
  public static function addRow($table, $header, $value)
  {
    $row = '<tr><th>';
    $row .= Html::txt2Html($header);
    $row .= '</th><td class="email">';
    if ($value!==null && $value!==false && $value!=='')
    {
      $address = Html::txt2Html($value);
      $row .= '<a href="mailto:';
      $row .= $address;
      $row .= '">';
      $row .= $address;
      $row .= '</a>';
    }
    $row .= '</td></tr>';

    $table->addRow($row);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

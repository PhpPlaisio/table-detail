<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Helper\Html;
use SetBased\Abc\Table\DetailTable;

//----------------------------------------------------------------------------------------------------------------------
/**
 * Table row in a detail table with a hyperlink.
 */
class HyperLinkTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a hyper link to a detail table.
   *
   * @param DetailTable $table  The (detail) table.
   * @param string      $header The row header text.
   * @param string      $value  The hyper link.
   */
  public static function addRow($table, $header, $value)
  {
    $row = '<tr><th>';
    $row .= Html::txt2Html($header);
    $row .= '</th><td>';
    if ($value!==null && $value!==false && $value!=='')
    {
      $row .= Html::generateElement('a', ['href' => $value], $value);
    }
    $row .= '</td></tr>';

    $table->addRow($row);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

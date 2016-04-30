<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Helper\Html;
use SetBased\Abc\Table\DetailTable;

//--------------------------------------------------------------------------------------------------------------------
/**
 * Table row in a detail table with any HTML code.
 */
class HtmlTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a HTML snippet to a detail table.
   *
   * @param DetailTable $table       The (detail) table.
   * @param string      $header      The row header text.
   * @param string      $htmlSnippet The HTML snippet.
   */
  public static function addRow($table, $header, $htmlSnippet)
  {
    $row = '<tr><th>';
    $row .= Html::txt2Html($header);
    $row .= '</th><td class="html">';
    $row .= $htmlSnippet;
    $row .= '</td></tr>';

    $table->addRow($row);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\Table\TableRow;

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
   * @param DetailTable $table       The detail table.
   * @param int|string  $header      The row header text or word ID.
   * @param string      $htmlSnippet The HTML snippet.
   */
  public static function addRow($table, $header, $htmlSnippet)
  {
    $table->addRow($header, ['class' => 'html'], $htmlSnippet, true);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
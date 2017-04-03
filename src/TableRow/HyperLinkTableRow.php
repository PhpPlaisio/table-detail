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
   * @param DetailTable $table  The detail table.
   * @param int|string  $header The row header text or word ID.
   * @param string      $value  The hyper link.
   */
  public static function addRow($table, $header, $value)
  {
    if ($value!==null && $value!==false && $value!=='')
    {
      $a = Html::generateElement('a', ['href' => $value], $value);

      $table->addRow($header, [], $a, true);
    }
    else
    {
      $table->addRow($header);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

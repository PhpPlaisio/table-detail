<?php

namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Helper\Html;
use SetBased\Abc\Table\DetailTable;

/**
 * Table row in a detail table with a hyperlink.
 */
class HyperLinkTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a hyper link to a detail table.
   *
   * @param DetailTable     $table  The detail table.
   * @param string|int|null $header The header text of this table row.
   * @param string          $value  The hyper link.
   */
  public static function addRow(DetailTable $table, $header, ?string $value): void
  {
    if ($value!==null && $value!=='')
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

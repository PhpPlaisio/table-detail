<?php

namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Helper\Html;
use SetBased\Abc\Table\DetailTable;

/**
 * Table row in a detail table with aa email address.
 */
class EmailTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a email address to a detail table.
   *
   * @param DetailTable     $table  The detail table.
   * @param string|int|null $header The header text of this table row.
   * @param string|null     $value  The email address.
   */
  public static function addRow(DetailTable $table, $header, ?string $value): void
  {
    if ($value!==null && $value!=='')
    {
      $a = Html::generateElement('a', ['href' => 'mailto:'.$value], $value);

      $table->addRow($header, ['class' => 'email'], $a, true);
    }
    else
    {
      $table->addRow($header);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

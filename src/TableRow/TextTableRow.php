<?php

namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Table\DetailTable;

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
   * @param string|null $text   The text.
   */
  public static function addRow(DetailTable $table, $header, ?string $text): void
  {
    if ($text!==null && $text!=='')
    {
      $table->addRow($header, ['class' => 'text'], $text);
    }
    else
    {
      $table->addRow($header);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

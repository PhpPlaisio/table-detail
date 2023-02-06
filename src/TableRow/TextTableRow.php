<?php
declare(strict_types=1);

namespace Plaisio\Table\TableRow;

use Plaisio\Table\DetailTable;

/**
 * Table row in a detail table with plain text.
 */
class TextTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a text value to a detail table.
   *
   * @param DetailTable     $table  The detail table.
   * @param int|string|null $header The header text of this table row.
   * @param string|null     $text   The text.
   */
  public static function addRow(DetailTable $table, int|string|null $header, ?string $text): void
  {
    $table->addRow($header, ['class' => $table->renderWalker->getClasses(['cell', 'text'])], $text);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

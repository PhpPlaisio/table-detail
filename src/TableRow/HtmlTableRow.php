<?php
declare(strict_types=1);

namespace Plaisio\Table\TableRow;

use Plaisio\Table\DetailTable;

/**
 * Table row in a detail table with any HTML code.
 */
class HtmlTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a HTML snippet to a detail table.
   *
   * @param DetailTable     $table       The detail table.
   * @param int|string|null $header      The header text of this table row.
   * @param string|null     $htmlSnippet The HTML snippet.
   */
  public static function addRow(DetailTable $table, int|string|null $header, ?string $htmlSnippet): void
  {
    $table->addRow($header, ['class' => $table->renderWalker->getClasses(['cell', 'cell-html'])], $htmlSnippet, true);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

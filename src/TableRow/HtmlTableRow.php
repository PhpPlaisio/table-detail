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
   * @param string|int|null $header      The header text of this table row.
   * @param string|null     $htmlSnippet The HTML snippet.
   */
  public static function addRow(DetailTable $table, $header, ?string $htmlSnippet): void
  {
    $table->addRow($header, ['class' => $table->renderWalker->getClasses(['cell', 'html'])], $htmlSnippet, true);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

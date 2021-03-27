<?php
declare(strict_types=1);

namespace Plaisio\Table\TableRow;

use Plaisio\Helper\Html;
use Plaisio\Table\DetailTable;

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
   * @param string|null     $value  The hyper link.
   */
  public static function addRow(DetailTable $table, $header, ?string $value): void
  {
    if ($value!==null && $value!=='')
    {
      $table->addRow($header,
                     ['class' => $table->renderWalker->getClasses('link')],
                     Html::generateElement('a', ['href' => $value], $value),
                     true);
    }
    else
    {
      $table->addRow($header, ['class' => $table->renderWalker->getClasses('link')]);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

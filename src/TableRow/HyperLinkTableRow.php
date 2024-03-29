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
   * Adds a row with a hyperlink to a detail table.
   *
   * @param DetailTable     $table  The detail table.
   * @param int|string|null $header The header text of this table row.
   * @param string|null     $value  The hyperlink.
   */
  public static function addRow(DetailTable $table, int|string|null $header, ?string $value): void
  {
    if ($value===null || $value==='')
    {
      $table->addRow($header, ['class' => $table->renderWalker->getClasses(['cell', 'cell-link'])]);
    }
    else
    {
      $table->addRow($header,
                     ['class' => $table->renderWalker->getClasses(['cell', 'cell-link'])],
                     Html::htmlNested(['tag'  => 'a',
                                       'attr' => ['class' => 'link',
                                                  'href'  => $value],
                                       'text' => $value]),
                     true);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

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
   * @param string|int|null $header The header text of this table row.
   * @param string|null     $value  The hyperlink.
   */
  public static function addRow(DetailTable $table, $header, ?string $value): void
  {
    if ($value!==null && $value!=='')
    {
      $table->addRow($header,
                     ['class' => $table->renderWalker->getClasses(['cell', 'link'])],
                     Html::htmlNested(['tag'  => 'a',
                                       'attr' => ['class' => 'link',
                                                  'href'  => $value],
                                       'text' => $value]),
                     true);
    }
    else
    {
      $table->addRow($header, ['class' => $table->renderWalker->getClasses(['cell', 'link'])]);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

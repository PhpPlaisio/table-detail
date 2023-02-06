<?php
declare(strict_types=1);

namespace Plaisio\Table\TableRow;

use Plaisio\Helper\Html;
use Plaisio\Table\DetailTable;

/**
 * Table row in a detail table with aa email address.
 */
class EmailTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with an email address to a detail table.
   *
   * @param DetailTable     $table  The detail table.
   * @param int|string|null $header The header text of this table row.
   * @param string|null     $value  The email address.
   */
  public static function addRow(DetailTable $table, int|string|null $header, ?string $value): void
  {
    if ($value!==null && $value!=='')
    {
      $table->addRow($header,
                     ['class' => $table->renderWalker->getClasses(['cell', 'email'])],
                     Html::htmlNested(['tag'  => 'a',
                                       'attr' => ['class' => ['link', 'link-mailto'],
                                                  'href'  => 'mailto:'.$value],
                                       'text' => $value]),
                     true);
    }
    else
    {
      $table->addRow($header, ['class' => $table->renderWalker->getClasses(['cell', 'email'])]);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

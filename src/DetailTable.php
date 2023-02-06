<?php
declare(strict_types=1);

namespace Plaisio\Table;

use Plaisio\Helper\Html;
use Plaisio\Helper\HtmlElement;
use Plaisio\Helper\RenderWalker;
use Plaisio\Kernel\Nub;

/**
 * Class for generating tables with the details of an entity.
 *
 * @property-read RenderWalker $renderWalker The render walker.
 */
class DetailTable
{
  //--------------------------------------------------------------------------------------------------------------------
  use HtmlElement;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The HTML snippet with all rows of this table.
   *
   * @var string
   */
  protected string $rows = '';

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * DetailTable constructor.
   */
  public function __construct()
  {
    $this->renderWalker = new RenderWalker('dt');
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @param int|string|null $header     The header text of this table row. We distinguish 3 cases:
   *                                    <ul>
   *                                    <li>string: the value is the header text of this table row,
   *                                    <li>int: the value is a word ID to be resolved to a text using Babel,
   *                                    <li>null: this table row has an empty header.
   *                                    </ul>
   * @param array           $attributes The attributes of the data cell. Special characters in the attributes
   *                                    will be replaced with HTML entities.
   * @param string|null     $innerText  The inner text of data table cell.
   * @param bool            $isHtml     Whether the inner text is an HTML snippet or plain text.
   */
  public function addRow(int|string|null $header,
                         array           $attributes = [],
                         ?string         $innerText = null,
                         bool            $isHtml = false): void
  {
    $struct = ['tag'   => 'tr',
               'attr'  => ['class' => $this->renderWalker->getClasses('row')],
               'inner' => [['html' => $this->htmlRowHeader($header)],
                           ['tag'                       => 'td',
                            'attr'                      => $attributes,
                            ($isHtml) ? 'html' : 'text' => $innerText]]];

    $this->addRowSnippet(Html::htmlNested($struct));
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row to this table.
   *
   * @param string $row An HTML snippet with a table row.
   */
  public function addRowSnippet(string $row): void
  {
    $this->rows .= $row;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the HTML code of this table.
   *
   * @return string
   */
  public function htmlTable(): string
  {
    $inner = [];

    $header = $this->htmlHeader();
    if ($header!=='')
    {
      $inner[] = ['tag'  => 'thead',
                  'attr' => ['class' => $this->renderWalker->getClasses('head')],
                  'html' => $header];
    }

    $inner[] = ['tag'  => 'tbody',
                'attr' => ['class' => $this->renderWalker->getClasses('body')],
                'html' => $this->rows];

    $footer = $this->htmlFooter();
    if ($footer!=='')
    {
      $inner[] = ['tag'  => 'tfoot',
                  'attr' => ['class' => $this->renderWalker->getClasses('foot')],
                  'html' => $header];
    }

    $this->addClasses($this->renderWalker->getClasses('table'));
    $struct = [['html' => $this->htmlPrefix()],
               ['tag'   => 'table',
                'attr'  => $this->attributes,
                'inner' => $inner],
               ['html' => $this->htmlPostfix()]];

    return Html::htmlNested($struct);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the inner HTML code of the footer for this table.
   *
   * @return string
   */
  protected function htmlFooter(): string
  {
    return '';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the inner HTML code of the header for this table.
   *
   * @return string
   */
  protected function htmlHeader(): string
  {
    return '';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns HTML code inserted before the HTML code of the table.
   *
   * @return string
   */
  protected function htmlPostfix(): string
  {
    return '';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns HTML code appended after the HTML code of the table.
   *
   * @return string
   */
  protected function htmlPrefix(): string
  {
    return '';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the HTML code for the header of the row.
   *
   * @param string|int|null $header The header text of this table row. We distinguish 3 cases:
   *                                <ul>
   *                                <li>string: the value is the header text of this table row,
   *                                <li>int: the value is a word ID to be resolved to a text using Babel,
   *                                <li>null: this table row has an empty header.
   *                                </ul>
   *
   * Note: 14 is a word ID and '14' is a header text.
   *
   * @return string
   */
  protected function htmlRowHeader($header): string
  {
    $struct = ['tag'  => 'th',
               'attr' => ['class' => $this->renderWalker->getClasses('header')],
               'text' => (is_int($header)) ? Nub::$nub->babel->getWord($header) : $header];

    return Html::htmlNested($struct);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

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
   * @param string|int|null $header     The header text of this table row. We distinguish 3 cases:
   *                                    <ul>
   *                                    <li>string: the value is the header text of this table row,
   *                                    <li>int: the value is a word ID to be resolved to a text using Babel,
   *                                    <li>null: this table row has an empty header.
   *                                    </ul>
   * @param array           $attributes The attributes of the data cell. Special characters in the attributes
   *                                    will be replaced with HTML entities.
   * @param string|null     $innerText  The inner text of data table cell.
   * @param bool            $isHtml     If true the inner text is a HTML snippet, otherwise special characters in
   *                                    the inner text will be replaced with HTML entities.
   */
  public function addRow($header, array $attributes = [], ?string $innerText = null, bool $isHtml = false): void
  {
    $row = Html::generateTag('tr', ['class' => $this->renderWalker->getClasses('row')]);
    $row .= $this->getHtmlRowHeader($header);
    $row .= Html::generateElement('td', $attributes, $innerText, $isHtml);
    $row .= '</tr>';

    $this->addRowSnippet($row);
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
  public function getHtmlTable(): string
  {
    $this->addClasses($this->renderWalker->getClasses());

    $ret = $this->getHtmlPrefix();

    $ret .= Html::generateTag('table', $this->attributes);

    $childAttributes = ['class' => $this->renderWalker->getClasses()];

    // Generate HTML code for the table header.
    $inner = $this->getHtmlHeader();
    if ($inner!=='')
    {
      $ret .= Html::generateElement('thead', $childAttributes, $inner, true);
    }

    // Generate HTML code for the table body.
    $ret .= Html::generateTag('tbody', $childAttributes);
    $ret .= $this->rows;
    $ret .= '</tbody>';

    // Generate HTML code for the table header.
    $inner = $this->getHtmlFooter();
    if ($inner!=='')
    {
      $ret .= Html::generateElement('tfoot', $childAttributes, $inner, true);
    }

    $ret .= '</table>';

    $ret .= $this->getHtmlPostfix();

    return $ret;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the inner HTML code of the footer for this table.
   *
   * @return string
   */
  protected function getHtmlFooter(): string
  {
    return '';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the inner HTML code of the header for this table.
   *
   * @return string
   */
  protected function getHtmlHeader(): string
  {
    return '';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns HTML code inserted before the HTML code of the table.
   *
   * @return string
   */
  protected function getHtmlPostfix(): string
  {
    return '';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns HTML code appended after the HTML code of the table.
   *
   * @return string
   */
  protected function getHtmlPrefix(): string
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
  protected function getHtmlRowHeader($header): string
  {
    $html = Html::generateTag('th', ['class' => $this->renderWalker->getClasses()]);
    $html .= (is_int($header)) ? Nub::$nub->babel->getWord($header) : $header;
    $html .= '</th>';

    return $html;
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------

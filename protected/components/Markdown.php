<?php
/**
 * CMarkdown class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2010 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * CMarkdown converts the captured content from markdown syntax to HTML code.
 *
 * CMarkdown can be used as either a widget or a filter. It is a wrapper of {@link CMarkdownParser}.
 * CMarkdown adds an additional option {@link purifyOutput} which can be set true
 * so that the converted HTML code is purified before being displayed.
 *
 * For details about the markdown syntax, please check the following:
 * <ul>
 * <li>{@link http://daringfireball.net/projects/markdown/syntax official markdown syntax}</li>
 * <li>{@link http://michelf.com/projects/php-markdown/extra/ markdown extra syntax}</li>
 * <li>{@link CMarkdownParser markdown with syntax highlighting}</li>
 * </ul>
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: Markdown.php 25 2010-01-15 06:54:10Z mocapapa@g.pugpug.org $
 * @package system.web.widgets
 * @since 1.0
 */
class Markdown extends CMarkdown
{
	/**
	 * Creates a markdown parser.
	 * By default, this method creates a {@link CMarkdownParser} instance.
	 * @return CMarkdownParser the markdown parser.
	 */
	protected function createMarkdownParser()
	{
		return new MarkdownParserHighslide;
	}
}

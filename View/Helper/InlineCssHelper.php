<?php

use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

class InlineCssHelper extends AppHelper {

/**
 * After layout logic.
 *
 * @param string $layoutFile
 * @return void
 */
	public function afterLayout($layoutFile) {
		parent::afterLayout($layoutFile);

		$content = $this->_View->Blocks->get('content');

		if (!isset($this->InlineCss)) {
			$this->InlineCss = new CssToInlineStyles();
		}

		// Convert inline style blocks to inline CSS on the HTML content.
		$this->InlineCss->setHTML($content);
		$this->InlineCss->setUseInlineStylesBlock(true);
		$content = $this->InlineCss->convert();

		$this->_View->Blocks->set('content', $content);

		return;
	}

/**
 * Checks if a string contains HTML or not.
 *
 * @param string $str String content
 * @return bool
 */
	public function isHtml($str) {
		return $str !== strip_tags($str);
	}

}

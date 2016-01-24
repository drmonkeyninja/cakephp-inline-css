<?php

namespace InlineCss\View\Helper;

use Cake\View\Helper;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

class InlineCssHelper extends Helper
{

    /**
     * After layout logic.
     *
     * @param string $layoutFile
     */
    public function afterLayout($layoutFile)
    {
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

}

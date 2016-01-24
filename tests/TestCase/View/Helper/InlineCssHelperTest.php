<?php

namespace InlineCss\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\Network\Request;
use Cake\View\View;
use InlineCss\View\Helper\InlineCssHelper;

class InlineCssHelperTest extends TestCase
{

    public $InlineCss = null;

    public function setUp()
    {
        parent::setUp();

        $this->View = new View(new Request());
        $this->InlineCss = new InlineCssHelper($this->View);
    }

    public function testAfterLayout()
    {
        $html = $this->View->Blocks->set('content', '<style type="text/css">a{color:red}</style><p><a href="#">Test</a></p>');

        $this->InlineCss->afterLayout(null);

        $expected = '<p><a href="#" style="color: red;">Test</a></p>';
        $this->assertContains($expected, $this->View->Blocks->get('content'));
    }

}

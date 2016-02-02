<?php
App::uses('Controller', 'Controller');
App::uses('View', 'View');
App::uses('HtmlHelper', 'View/Helper');
App::uses('InlineCssHelper', 'InlineCss.View/Helper');

class InlineCssHelperTest extends CakeTestCase {

	public $InlineCss = null;

	public function setUp() {
		parent::setUp();
		$Controller = new Controller();
		$this->View = new View($Controller);
		$this->InlineCss = new InlineCssHelper($this->View);
	}

	public function testAfterLayout() {
		$html = $this->View->Blocks->set('content', '<style type="text/css">a{color:red}</style><p><a href="#">Test</a></p>');

		$this->InlineCss->afterLayout(null);

		$expected = '<p><a href="#" style="color: red;">Test</a></p>';
		$this->assertContains($expected, $this->View->Blocks->get('content'));
	}

	public function testIsHtml() {
		$html = '<p>Hello World</p>';
		$result = $this->InlineCss->isHtml($html);
		$this->assertTrue($result);

		$text = 'Hello World';
		$result = $this->InlineCss->isHtml($text);
		$this->assertFalse($result);
	}

}

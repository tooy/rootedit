<?php

namespace rootedit\core;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-08-21 at 07:29:31.
 */
class RootEditTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var RootEdit
	 */
	protected $app;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		$this->app = new RootEdit;
	}

	public function testConstructor() {
		$dic = $this->app->dic();
		$this->assertNotNull($dic);
		$this->assertTrue($dic instanceof \rootedit\ioc\Container);

		$res = $this->app->response();
		$this->assertNotNull($res);
		$this->assertTrue($res instanceof \rootedit\core\Output);

		$req = $this->app->request();
		$this->assertNotNull($req);
		$this->assertTrue($req instanceof \rootedit\core\Input);

		$view = $this->app->view();
		$this->assertNotNull($view);
		$this->assertTrue($view instanceof \rootedit\core\View);
	}

	public function testAction() {
		$this->app->addTemplate('#', 'tpl.phtml');
		$this->app->addAction(function($in, $out, $app) {
			$out->slot1 = 'done';
			$out->slot2 = '';
		});

		ob_start();
		$this->app->process()->getBody()->getContents();
		$output = ob_get_clean();
		$this->assertEquals($output, '1done23');
	}

	public function testActionAndFilter() {
		$this->app->addTemplate('#', 'tpl.phtml');
		$this->app->addAction(function($in, $out, $app) {
			$out->slot1 = 'done';
			$out->slot2 = '';
		});
		$this->app->addFilter(new MsgMidleware('oki'));
		$this->app->addFilter(new MsgMidleware('doki'));

		ob_start();
		echo $this->app->process()->getBody()->getContents();
		$output = ob_get_clean();
		$this->assertEquals($output, '1done23okidoki');
	}

	public function testBaseRoute() {
		//Attention pouvoire modifier l'url avant ?? :'(

		//$this->app->request()->setPath('juste/for/anURL/');
		
		//$this->app->request()->getUri()->withPath('juste/for/anURL/');
		$this->app->request()->withUri(new URI('juste/for/anURL/'));
		
		$this->app->addRoute('juste/*/', 'racine' , true);
		$this->app->addRoute('juste/*/anURL/', 'route');
		
		$this->app->addTemplate('#', 'tpl2.phtml', 'racine');
		$this->app->addTemplate('slot3', 'tpl.phtml', 'route');
		$this->app->addAction(function($in, $out, $app) {
			$out->slot1 = 'done';
			$out->slot2 = '';
			$out->slot4='';
		}, 'route');
		$this->app->addFilter(new MsgMidleware('oki'), 'route');
		ob_start();
		echo $this->app->process()->getBody()->getContents();
		$output = ob_get_clean();
		$this->assertEquals('11done2323oki',$output);
	}

//    function testPourDire() {
//      //$this->assertTrue(fnmatch('*/fin/','/histoire/sans/fin/',FNM_PATHNAME),'*/fin/');
//      //$this->assertTrue(fnmatch('histoire/*','histoire/drole/',FNM_PATHNAME),'histoire/*');
//     // $this->assertTrue(fnmatch('histoire/*','histoire/sans/fin/',FNM_PATHNAME),'histoire/sans/fin/');
//      $this->assertTrue(fnmatch('histoire/*/auteur/*','histoire/1/fin/auteur/2/mauvais',FNM_PATHNAME),'histoire/1/fin/auteur/2/mauvais'); 
//    }

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {
		
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::clearCommand
	 * @todo   Implement testClearCommand().
	 */
	public function testClearCommand() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::pushCommand
	 * @todo   Implement testPushCommand().
	 */
	public function testPushCommand() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::pushFilter
	 * @todo   Implement testPushFilter().
	 */
	public function testPushFilter() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::clearFilter
	 * @todo   Implement testClearFilter().
	 */
	public function testClearFilter() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::addRoute
	 * @todo   Implement testAddRoute().
	 */
	public function testAddRoute() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::addRouteTemplate
	 * @todo   Implement testAddRouteTemplate().
	 */
	public function testAddRouteTemplate() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::addBaseRoute
	 * @todo   Implement testAddBaseRoute().
	 */
	public function testAddBaseRoute() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::addAction
	 * @todo   Implement testAddAction().
	 */
	public function testAddAction() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::addTemplate
	 * @todo   Implement testAddTemplate().
	 */
	public function testAddTemplate() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::pushTemplate
	 * @todo   Implement testPushTemplate().
	 */
	public function testPushTemplate() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::clearTemplate
	 * @todo   Implement testClearTemplate().
	 */
	public function testClearTemplate() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::clear
	 * @todo   Implement testClear().
	 */
	public function testClear() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::next
	 * @todo   Implement testNext().
	 */
	public function testNext() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::process
	 * @todo   Implement testProcess().
	 */
	public function testProcess() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::withMiddleware
	 * @todo   Implement testWithMiddleware().
	 */
	public function testWithMiddleware() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::withoutMiddleware
	 * @todo   Implement testWithoutMiddleware().
	 */
	public function testWithoutMiddleware() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::view
	 * @todo   Implement testView().
	 */
	public function testView() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::output
	 * @todo   Implement testOutput().
	 */
	public function testOutput() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers fr\webetplus\rootedit\core\RootEdit::input
	 * @todo   Implement testInput().
	 */
	public function testInput() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

}

class MsgMidleware implements \Psr\Http\Middleware\ServerMiddlewareInterface {

	private $msg;

	function __construct($msg) {
		$this->msg = $msg;
	}

	public function process(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Middleware\FrameInterface $frame) {
		$response = $frame->next($request);
		$response->getBody()->write($this->msg);
		return $response;
	}

}

class NextButNoReturnMidleware implements \Psr\Http\Middleware\ServerMiddlewareInterface {

	function __construct($msg) {
		$this->msg = $msg;
	}

	public function process(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Middleware\FrameInterface $frame) {
		$response = $frame->next($request);
	}

}

class NoNextAndNoReturnMidleware implements \Psr\Http\Middleware\ServerMiddlewareInterface {

	function __construct($msg) {
		$this->msg = $msg;
	}

	public function process(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Middleware\FrameInterface $frame) {
		//  $response = $frame->next($request);
		// return 
	}

}

class NoNextButReturnMidleware implements \Psr\Http\Middleware\ServerMiddlewareInterface {

	function __construct($msg) {
		$this->msg = $msg;
	}

	public function process(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Middleware\FrameInterface $frame) {
		//  $response = $frame->next($request);
		return new Response();
	}

}
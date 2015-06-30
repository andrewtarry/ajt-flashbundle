<?php
namespace AJT\FlashBundle\Tests\Twig;

use AJT\FlashBundle\Twig\FlashLoader;
use Mockery as m;
use Symfony\Component\HttpFoundation\Session\Session;

class FlashLoaderTest extends \PHPUnit_Framework_TestCase
{


    /**
     * @var \Mockery\MockInterface
     */
    private $session, $twig;

    public function setUp()
    {
        $this->session = m::mock(Session::class);
        $this->twig = m::mock(\Twig_Environment::class);
    }

    /**
     * @test
     */
    public function tearDown()
    {
        m::close();
    }

    /**
     * @test
     */
    public function getExtensionName()
    {
        $this->assertGreaterThan(1, strlen($this->getLoader()->getName()));
    }

    /**
     * @test
     */
    public function getFunctions()
    {
        $this->assertCount(1, $this->getLoader()->getFunctions());
    }

    /**
     * @test
     * @dataProvider displayInput
     */
    public function display($input)
    {
        $this->session->shouldReceive('getFlashBag->get')->andReturn([
            'an error'
        ]);

        $this->twig->shouldReceive('render')->atLeast(1)->andReturn('');

        $this->assertInternalType('string', $this->getLoader()->display(...$input));
    }

    public function displayInput()
    {
        return [
            [[]],
            [['error', 'warning']]
        ];
    }

    private function getLoader()
    {
        return new FlashLoader($this->session, $this->twig);
    }
}

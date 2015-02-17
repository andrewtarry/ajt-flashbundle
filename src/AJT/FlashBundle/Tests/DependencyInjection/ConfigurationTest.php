<?php
namespace AJT\FlashBundle\Tests\DependencyInjection;

use AJT\FlashBundle\DependencyInjection\Configuration;
use Matthias\SymfonyConfigTest\PhpUnit\AbstractConfigurationTestCase;
use Mockery as m;

class ConfigurationTest extends AbstractConfigurationTestCase
{

    /**
     * @test
     */
    public function noConfiguration()
    {
        $this->assertProcessedConfigurationEquals(array(),
            array(
                'core'   => array(
                    'success' => 'alert-success',
                    'error'   => 'alert-danger',
                    'info'    => 'alert-info',
                    'warning' => 'alert-warning'
                ),
                'custom' => array(),
                'default_class' => 'alert'
            ));
    }

    /**
     * @test
     */
    public function defaultClass()
    {
        $this->assertProcessedConfigurationEquals(array(array(
            'default_class' => null
        )),
            array(
                'core'   => array(
                    'success' => 'alert-success',
                    'error'   => 'alert-danger',
                    'info'    => 'alert-info',
                    'warning' => 'alert-warning'
                ),
                'custom' => array(),
                'default_class' => null
            ));
    }

    /**
     * @test
     */
    public function customCore()
    {
        $success = 'suc';
        $err = 'err';
        $info = 'info';
        $warn = 'warn';
        $this->assertProcessedConfigurationEquals(
            array(array(
                'core' => array(
                    'success' => $success,
                    'error'   => $err,
                    'info'    => $info,
                    'warning' => $warn
                )
            )),
            array(
                'core'   => array(
                    'success' => $success,
                    'error'   => $err,
                    'info'    => $info,
                    'warning' => $warn
                ),
                'custom' => array(),
                'default_class' => 'alert'
            ));
    }

    /**
     * @test
     */
    public function addCustom()
    {
        $this->assertProcessedConfigurationEquals(
            array(array(
                'custom' => array(
                    array(
                        'type' => 'myType',
                        'css' => 'myClass'
                    )
                )
            )),
            array(
                'core' => array(
                    'success' => 'alert-success',
                    'error'   => 'alert-danger',
                    'info'    => 'alert-info',
                    'warning' => 'alert-warning'
                ),
                'custom' => array(array(
                    'type' => 'myType',
                    'css' => 'myClass'
                )),
                'default_class' => 'alert'
            ));
    }

    /**
     * Return the instance of ConfigurationInterface that should be used by the
     * Configuration-specific assertions in this test-case
     *
     * @return \Symfony\Component\Config\Definition\ConfigurationInterface
     */
    protected function getConfiguration()
    {
        return new Configuration();
    }
}

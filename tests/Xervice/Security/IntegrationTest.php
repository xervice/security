<?php
namespace XerviceTest\Security;

use DataProvider\SimpleCredentialsDataProvider;
use DataProvider\TestKeyValueDataProvider;
use Xervice\Core\Locator\Dynamic\DynamicLocator;

require_once __DIR__ . '/TestInjector/SecurityDependencyProvider.php';

/**
 * @method \Xervice\Security\SecurityFacade getFacade()
 */
class IntegrationTest extends \Codeception\Test\Unit
{
    use DynamicLocator;

    /**
     * @group Xervice
     * @group Security
     * @group Integration
     *
     * @expectedException \Xervice\Security\Business\Exception\SecurityException
     */
    public function testSecurityWrongDataProvider()
    {
        $this->getFacade()->authenticate(
            'test',
            new TestKeyValueDataProvider()
        );
    }

    /**
     * @group Xervice
     * @group Security
     * @group Integration
     *
     * @expectedException \Xervice\Security\Business\Exception\SecurityException
     */
    public function testSecurityWrongLogin()
    {
        $credentials = new SimpleCredentialsDataProvider();
        $credentials
            ->setUsername('test')
            ->setPassword('unit');

        $this->getFacade()->authenticate(
            'test',
            $credentials
        );
    }

    /**
     * @group Xervice
     * @group Security
     * @group Integration
     */
    public function testSecuritySuccess()
    {
        $credentials = new SimpleCredentialsDataProvider();
        $credentials
            ->setUsername('unit')
            ->setPassword('test');

        $this->getFacade()->authenticate(
            'test',
            $credentials
        );
    }
}
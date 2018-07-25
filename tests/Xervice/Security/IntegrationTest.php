<?php
namespace XerviceTest\Security;

use DataProvider\AuthenticatorDataProvider;
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
        $credentials = new TestKeyValueDataProvider();

        $auth = new AuthenticatorDataProvider();
        $auth->setAuthData($credentials);

        $this->getFacade()->authenticate(
            'test',
            $auth
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

        $auth = new AuthenticatorDataProvider();
        $auth->setAuthData($credentials);

        $this->getFacade()->authenticate(
            'test',
            $auth
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

        $auth = new AuthenticatorDataProvider();
        $auth->setAuthData($credentials);

        $this->getFacade()->authenticate(
            'test',
            $auth
        );
    }
}
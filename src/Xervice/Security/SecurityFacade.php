<?php


namespace Xervice\Security;


use Xervice\Core\Facade\AbstractFacade;
use Xervice\DataProvider\DataProvider\AbstractDataProvider;
use Xervice\Security\Business\Provider\SecurityProviderInterface;

/**
 * @method \Xervice\Security\SecurityFactory getFactory()
 * @method \Xervice\Security\SecurityConfig getConfig()
 * @method \Xervice\Security\SecurityClient getClient()
 */
class SecurityFacade extends AbstractFacade
{
    /**
     * @param string $authenticator
     * @param \Xervice\DataProvider\DataProvider\AbstractDataProvider $dataProvider
     *
     * @throws \Xervice\Security\Business\Exception\SecurityException
     */
    public function authenticate(string $authenticator, AbstractDataProvider $dataProvider): void
    {
        $this->getFactory()->createSecurityProvider()->authenticate($authenticator, $dataProvider);
    }
}
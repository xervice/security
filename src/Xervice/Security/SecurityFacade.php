<?php


namespace Xervice\Security;


use DataProvider\AuthenticatorDataProvider;
use Xervice\Core\Facade\AbstractFacade;
use Xervice\DataProvider\DataProvider\AbstractDataProvider;

/**
 * @method \Xervice\Security\SecurityFactory getFactory()
 */
class SecurityFacade extends AbstractFacade
{
    /**
     * @param string $authenticator
     * @param \DataProvider\AuthenticatorDataProvider $dataProvider
     *
     */
    public function authenticate(string $authenticator, AuthenticatorDataProvider $dataProvider): void
    {
        $this->getFactory()->createSecurityProvider()->authenticate($authenticator, $dataProvider);
    }
}
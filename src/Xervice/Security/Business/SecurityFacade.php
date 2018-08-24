<?php


namespace Xervice\Security\Business;


use DataProvider\AuthenticatorDataProvider;
use Xervice\Core\Business\Model\Facade\AbstractFacade;

/**
 * @method \Xervice\Security\Business\SecurityBusinessFactory getFactory()
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
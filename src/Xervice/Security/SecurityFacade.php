<?php


namespace Xervice\Security;


use Xervice\Core\Facade\AbstractFacade;
use Xervice\DataProvider\DataProvider\AbstractDataProvider;

/**
 * @method \Xervice\Security\SecurityFactory getFactory()
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
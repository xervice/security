<?php


namespace Xervice\Security;


use Xervice\Core\Factory\AbstractFactory;
use Xervice\Security\Business\Provider\SecurityProvider;
use Xervice\Security\Business\Provider\SecurityProviderInterface;

/**
 * @method \Xervice\Security\SecurityConfig getConfig()
 */
class SecurityFactory extends AbstractFactory
{
    /**
     * @return \Xervice\Security\Business\Provider\SecurityProvider
     */
    public function createSecurityProvider(): SecurityProviderInterface
    {
        return new SecurityProvider(
            $this->getAuthenticatorList()
        );
    }

    /**
     * @return array
     */
    public function getAuthenticatorList(): array
    {
        return $this->getDependency(SecurityDependencyProvider::AUTHENTICATOR_LIST);
    }
}
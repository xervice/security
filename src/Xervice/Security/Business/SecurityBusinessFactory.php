<?php
declare(strict_types=1);

namespace Xervice\Security\Business;


use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;
use Xervice\Security\Business\Model\Provider\SecurityProvider;
use Xervice\Security\Business\Model\Provider\SecurityProviderInterface;
use Xervice\Security\SecurityDependencyProvider;

class SecurityBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Xervice\Security\Business\Model\Provider\SecurityProviderInterface
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
<?php


namespace Xervice\Security;


use Xervice\Core\Business\Model\Dependency\DependencyContainerInterface;
use Xervice\Core\Business\Model\Dependency\Provider\AbstractDependencyProvider;

class SecurityDependencyProvider extends AbstractDependencyProvider
{
    public const AUTHENTICATOR_LIST = 'authenticator.list';

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    public function handleDependencies(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container = $this->addAuthenticatorList($container);

        return $container;
    }

    /**
     * Give a list of valid authenticator (string => AuthenticatorInterface::class)
     * e.g.
     * token => tokenAuthenticator::class
     *
     * @return array
     */
    protected function getAuthenticatorList(): array
    {
        return [];
    }

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    protected function addAuthenticatorList(
        DependencyContainerInterface $container
    ): DependencyContainerInterface {
        $container[self::AUTHENTICATOR_LIST] = function () {
            return $this->getAuthenticatorList();
        };
        return $container;
    }
}

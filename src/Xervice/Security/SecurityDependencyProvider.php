<?php


namespace Xervice\Security;


use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;

/**
 * @method \Xervice\Core\Locator\Locator getLocator()
 */
class SecurityDependencyProvider extends AbstractProvider
{
    public const AUTHENTICATOR_LIST = 'authenticator.list';

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $dependencyProvider
     */
    public function handleDependencies(DependencyProviderInterface $dependencyProvider): void
    {
        $dependencyProvider[self::AUTHENTICATOR_LIST] = function () {
            return $this->getAuthenticatorList();
        };
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
}
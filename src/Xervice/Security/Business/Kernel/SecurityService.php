<?php


namespace Xervice\Security\Business\Kernel;


use Xervice\Core\Locator\AbstractWithLocator;
use Xervice\DataProvider\DataProvider\AbstractDataProvider;
use Xervice\Kernel\Business\Service\ServiceInterface;
use Xervice\Kernel\Business\Service\ServiceProviderInterface;

/**
 * @method \Xervice\Security\SecurityFacade getFacade()
 */
class SecurityService extends AbstractWithLocator implements ServiceInterface
{
    /**
     * @param \Xervice\Kernel\Business\Service\ServiceProviderInterface $serviceProvider
     */
    public function boot(ServiceProviderInterface $serviceProvider): void
    {
    }

    /**
     * @param \Xervice\Kernel\Business\Service\ServiceProviderInterface $serviceProvider
     */
    public function execute(ServiceProviderInterface $serviceProvider): void
    {
    }

    /**
     * @param string $authenticator
     * @param \Xervice\DataProvider\DataProvider\AbstractDataProvider $dataProvider
     *
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     * @throws \Xervice\Security\Business\Exception\SecurityException
     */
    public function authenticate(string $authenticator, AbstractDataProvider $dataProvider): void
    {
        $this->getFacade()->authenticate($authenticator, $dataProvider);
    }
}
<?php

namespace Xervice\Security\Business\Model\Provider;

use DataProvider\AuthenticatorDataProvider;
use Xervice\Security\Business\Dependency\Authenticator\AuthenticatorInterface;

interface SecurityProviderInterface
{
    /**
     * @param string $name
     * @param \Xervice\Security\Business\Dependency\Authenticator\AuthenticatorInterface $authenticator
     */
    public function add(string $name, AuthenticatorInterface $authenticator): void;

    /**
     * @param string $name
     *
     * @return \Xervice\Security\Business\Dependency\Authenticator\AuthenticatorInterface
     */
    public function get(string $name): AuthenticatorInterface;

    /**
     * @param string $name
     * @param \DataProvider\AuthenticatorDataProvider $dataProvider
     */
    public function authenticate(string $name, AuthenticatorDataProvider $dataProvider): void;
}
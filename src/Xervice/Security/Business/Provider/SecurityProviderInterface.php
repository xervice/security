<?php

namespace Xervice\Security\Business\Provider;

use Xervice\DataProvider\DataProvider\AbstractDataProvider;
use Xervice\Security\Business\Authenticator\AuthenticatorInterface;

interface SecurityProviderInterface
{
    /**
     * @param string $name
     * @param \Xervice\Security\Business\Authenticator\AuthenticatorInterface $authenticator
     */
    public function add(string $name, AuthenticatorInterface $authenticator): void;

    /**
     * @param string $name
     *
     * @return \Xervice\Security\Business\Authenticator\AuthenticatorInterface
     * @throws \Xervice\Security\Business\Exception\SecurityException
     */
    public function get(string $name): AuthenticatorInterface;

    /**
     * @param string $name
     * @param \Xervice\DataProvider\DataProvider\AbstractDataProvider $dataProvider
     *
     *
     */
    public function authenticate(string $name, AbstractDataProvider $dataProvider): void;
}
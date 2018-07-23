<?php


namespace Xervice\Security\Business\Authenticator;


use Xervice\DataProvider\DataProvider\DataProviderInterface;

interface AuthenticatorInterface
{
    /**
     * @param \Xervice\DataProvider\DataProvider\DataProviderInterface $dataProvider
     *
     * @return void
     */
    public function authenticate(DataProviderInterface $dataProvider): void;
}
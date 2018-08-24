<?php


namespace Xervice\Security\Business\Dependency\Authenticator;


use DataProvider\AuthenticatorDataProvider;

interface AuthenticatorInterface
{
    /**
     * @param \DataProvider\AuthenticatorDataProvider $dataProvider
     *
     * @return void
     */
    public function authenticate(AuthenticatorDataProvider $dataProvider): void;
}
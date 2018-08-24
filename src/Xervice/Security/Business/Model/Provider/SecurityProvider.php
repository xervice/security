<?php


namespace Xervice\Security\Business\Model\Provider;


use DataProvider\AuthenticatorDataProvider;
use Xervice\Security\Business\Dependency\Authenticator\AuthenticatorInterface;
use Xervice\Security\Business\Exception\SecurityException;

class SecurityProvider implements SecurityProviderInterface
{
    /**
     * @var \Xervice\Security\Business\Dependency\Authenticator\AuthenticatorInterface[]
     */
    private $authenticatorList;

    /**
     * SecurityProvider constructor.
     *
     * @param array $authenticatorList
     */
    public function __construct(array $authenticatorList)
    {
        foreach ($authenticatorList as $name => $authClass) {
            $this->add(
                $name,
                new $authClass()
            );
        }
    }

    /**
     * @param string $name
     * @param \Xervice\Security\Business\Dependency\Authenticator\AuthenticatorInterface $authenticator
     */
    public function add(string $name, AuthenticatorInterface $authenticator): void
    {
        $this->authenticatorList[$name] = $authenticator;
    }

    /**
     * @param string $name
     *
     * @return \Xervice\Security\Business\Dependency\Authenticator\AuthenticatorInterface
     * @throws \Xervice\Security\Business\Exception\SecurityException
     */
    public function get(string $name): AuthenticatorInterface
    {
        if (!isset($this->authenticatorList[$name])) {
            throw new SecurityException(
                sprintf(
                    'Authenticator %s does not exist',
                    $name
                )
            );
        }

        return $this->authenticatorList[$name];
    }

    /**
     * @param string $name
     * @param \DataProvider\AuthenticatorDataProvider $dataProvider
     *
     * @throws \Xervice\Security\Business\Exception\SecurityException
     */
    public function authenticate(string $name, AuthenticatorDataProvider $dataProvider): void
    {
        $this->get($name)->authenticate($dataProvider);
    }
}
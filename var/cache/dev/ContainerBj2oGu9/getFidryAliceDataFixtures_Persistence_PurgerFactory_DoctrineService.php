<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'fidry_alice_data_fixtures.persistence.purger_factory.doctrine' shared service.

return $this->services['fidry_alice_data_fixtures.persistence.purger_factory.doctrine'] = new \Fidry\AliceDataFixtures\Bridge\Doctrine\Purger\Purger(($this->services['doctrine.orm.default_entity_manager'] ?? $this->load('getDoctrine_Orm_DefaultEntityManagerService.php')));

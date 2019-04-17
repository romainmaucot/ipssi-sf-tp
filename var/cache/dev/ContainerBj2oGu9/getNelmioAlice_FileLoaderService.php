<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'nelmio_alice.file_loader' shared service.

return $this->services['nelmio_alice.file_loader'] = new \Nelmio\Alice\Loader\SimpleFileLoader(($this->privates['nelmio_alice.file_parser.runtime_cache'] ?? $this->load('getNelmioAlice_FileParser_RuntimeCacheService.php')), ($this->services['nelmio_alice.data_loader'] ?? $this->load('getNelmioAlice_DataLoaderService.php')));

<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'debug.argument_resolver.service' shared service.

return $this->privates['debug.argument_resolver.service'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\TraceableValueResolver(new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'App\\Controller\\ArticleController::delete' => ['privates', '.service_locator.NUP9Hmn', 'get_ServiceLocator_NUP9HmnService.php', true],
    'App\\Controller\\ArticleController::edit' => ['privates', '.service_locator.NUP9Hmn', 'get_ServiceLocator_NUP9HmnService.php', true],
    'App\\Controller\\ArticleController::index' => ['privates', '.service_locator.eusJIZx', 'get_ServiceLocator_EusJIZxService.php', true],
    'App\\Controller\\ArticleController::show' => ['privates', '.service_locator.NUP9Hmn', 'get_ServiceLocator_NUP9HmnService.php', true],
    'App\\Controller\\CommentController::delete' => ['privates', '.service_locator.Gn3oxQ2', 'get_ServiceLocator_Gn3oxQ2Service.php', true],
    'App\\Controller\\CommentController::edit' => ['privates', '.service_locator.Gn3oxQ2', 'get_ServiceLocator_Gn3oxQ2Service.php', true],
    'App\\Controller\\CommentController::index' => ['privates', '.service_locator.Ye_qt7H', 'get_ServiceLocator_YeQt7HService.php', true],
    'App\\Controller\\CommentController::show' => ['privates', '.service_locator.Gn3oxQ2', 'get_ServiceLocator_Gn3oxQ2Service.php', true],
    'App\\Controller\\GameController::play' => ['privates', '.service_locator.qO6N7LW', 'get_ServiceLocator_QO6N7LWService.php', true],
    'App\\Controller\\SecurityController::login' => ['privates', '.service_locator.EbLunuf', 'get_ServiceLocator_EbLunufService.php', true],
    'App\\Controller\\ArticleController:delete' => ['privates', '.service_locator.NUP9Hmn', 'get_ServiceLocator_NUP9HmnService.php', true],
    'App\\Controller\\ArticleController:edit' => ['privates', '.service_locator.NUP9Hmn', 'get_ServiceLocator_NUP9HmnService.php', true],
    'App\\Controller\\ArticleController:index' => ['privates', '.service_locator.eusJIZx', 'get_ServiceLocator_EusJIZxService.php', true],
    'App\\Controller\\ArticleController:show' => ['privates', '.service_locator.NUP9Hmn', 'get_ServiceLocator_NUP9HmnService.php', true],
    'App\\Controller\\CommentController:delete' => ['privates', '.service_locator.Gn3oxQ2', 'get_ServiceLocator_Gn3oxQ2Service.php', true],
    'App\\Controller\\CommentController:edit' => ['privates', '.service_locator.Gn3oxQ2', 'get_ServiceLocator_Gn3oxQ2Service.php', true],
    'App\\Controller\\CommentController:index' => ['privates', '.service_locator.Ye_qt7H', 'get_ServiceLocator_YeQt7HService.php', true],
    'App\\Controller\\CommentController:show' => ['privates', '.service_locator.Gn3oxQ2', 'get_ServiceLocator_Gn3oxQ2Service.php', true],
    'App\\Controller\\GameController:play' => ['privates', '.service_locator.qO6N7LW', 'get_ServiceLocator_QO6N7LWService.php', true],
    'App\\Controller\\SecurityController:login' => ['privates', '.service_locator.EbLunuf', 'get_ServiceLocator_EbLunufService.php', true],
])), ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))));

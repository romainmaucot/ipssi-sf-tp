<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXAJNu4J\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXAJNu4J/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerXAJNu4J.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerXAJNu4J\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerXAJNu4J\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'XAJNu4J',
    'container.build_id' => '5bf43adc',
    'container.build_time' => 1555410412,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerXAJNu4J');

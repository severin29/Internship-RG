<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container0RDfQB3\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container0RDfQB3/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container0RDfQB3.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container0RDfQB3\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container0RDfQB3\App_KernelDevDebugContainer([
    'container.build_hash' => '0RDfQB3',
    'container.build_id' => '06cf6c57',
    'container.build_time' => 1727079340,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'Container0RDfQB3');

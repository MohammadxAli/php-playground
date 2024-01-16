<?php
use Core\Container;

test('it should bind and resolve a container', function () {
    $container = new Container();

    $container->bind('foo', fn() => 'bar');

    $result = $container->resolve('foo');

    expect($result)->toBe('bar');
});

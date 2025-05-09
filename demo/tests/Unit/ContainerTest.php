<?php

use Core\Container;

test('it can resolve something out of the container', function () {
    // arrange
    $container = new Container();

    $container->bind('foo', fn() => 'bar');

    // act
    $result = $container->resolve('foo');

    // expect
    expect($result)->toEqual('sdsdsdsdsdsd');
});


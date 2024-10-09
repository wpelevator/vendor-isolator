<?php

namespace XWP\ComposerIsolatorTest;

use PHPUnit\Framework\TestCase;
use XWP\ComposerIsolator\NamespaceChecker;

class TestNamespaceChecker extends TestCase
{
    public function testIsNamespace()
    {
        $this->assertTrue(NamespaceChecker::isNamespace('\\Vendor\\Prefix'));
        $this->assertFalse(NamespaceChecker::isNamespace('SomeRandomString'));
    }

    public function testShouldTransform()
    {
        $namespaces_to_transform = [
            'Vendor\\Package'  => true,
            'NotOur\\Prefix'   => true,
            'Not\\Our\\Prefix' => true,
        ];

        $checker = new NamespaceChecker($namespaces_to_transform, 'Our\\Prefix');

        $this->assertFalse(
            $checker->shouldTransform('\\WP_Post'),
            'Skip transforming unknown namespaces'
        );

        $this->assertTrue(
            $checker->shouldTransform('Vendor\\Package'),
            'Transform listed namespaces'
        );

        $this->assertFalse(
            $checker->shouldTransform('Our\\Prefix'),
            'Skip transforming our own namespace'
        );
    }
}

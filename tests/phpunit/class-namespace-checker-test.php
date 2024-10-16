<?php

namespace WPElevator\Vendor_IsolatorTest;

use PHPUnit\Framework\TestCase;
use WPElevator\Vendor_Isolator\Namespace_Checker;

class Test_Namespace_Checker extends TestCase {

	public function test_is_namespace() {
		$this->assertTrue( Namespace_Checker::isNamespace( '\\Vendor\\Prefix' ) );
		$this->assertFalse( Namespace_Checker::isNamespace( 'SomeRandomString' ) );
	}

	public function testShouldTransform() {
		$namespaces_to_transform = [
			'Vendor\\Package'  => true,
			'NotOur\\Prefix'   => true,
			'Not\\Our\\Prefix' => true,
		];

		$checker = new Namespace_Checker( $namespaces_to_transform, 'Our\\Prefix' );

		$this->assertFalse(
			$checker->shouldTransform( '\\WP_Post' ),
			'Skip transforming unknown namespaces'
		);

		$this->assertTrue(
			$checker->shouldTransform( 'Vendor\\Package' ),
			'Transform listed namespaces'
		);

		$this->assertFalse(
			$checker->shouldTransform( 'Our\\Prefix' ),
			'Skip transforming our own namespace'
		);
	}
}

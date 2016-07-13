<?php
/**
 * Created by PhpStorm.
 * User: gary
 * Date: 13/07/2016
 * Time: 12:38
 */

namespace ModularWP\Formalize\Templates;

use ModularWP\Formalize\FieldInterface;
use PHPUnit_Framework_TestCase;

class BaseTest extends PHPUnit_Framework_TestCase {
	/**
	 * @covers ModularWP\Formalize\Templates\Base::generate_label()
	 */
	public function testEmptyGenerateLabelReturnsNull() {
		// Arrange.
		$template = new ConcreteBaseTemplate();

		// Act.
		$label = $template->generate_label();

		// Assert.
		$this->assertNull( $label );
	}

	/**
	 * @covers ModularWP\Formalize\Templates\Base::generate_label()
	 */
	public function testGenerateLabelWithNoIdReturnsLabelWithEmptyFor() {
		// Arrange.
		$template = new ConcreteBaseTemplate();

		// Act.
		$label = $template->generate_label( 'Foobar' );
		$expected = '<label for="">Foobar</label>';

		// Assert.
		$this->assertEquals( $expected, $label );
	}

	/**
	 * @covers ModularWP\Formalize\Templates\Base::generate_label()
	 */
	public function testGenerateLabelWithIdReturnsLabelWithForPopulated() {
		// Arrange.
		$template = new ConcreteBaseTemplate();

		// Act.
		$label = $template->generate_label( 'Foobar', 'my-id' );
		$expected = '<label for="my-id">Foobar</label>';

		// Assert.
		$this->assertEquals( $expected, $label );
	}
}

class ConcreteBaseTemplate extends Base {
	public function output( FieldInterface $field, $instance = array() ) {

	}
}
<?php

namespace Drupal\field_module\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'field_module_rgb' field type.
 *
 * @FieldType(
 *   id = "field_module_rgb",
 *   label = @Translation("Example Color RGB"),
 *   module = "field_module",
 *   description = @Translation("Demonstrates a field composed of an RGB color."),
 *   default_widget = "field_module_text",
 *   default_formatter = "field_module_simple_text"
 * )
 */
class RgbItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'text',
          'size' => 'tiny',
          'not null' => FALSE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Hex value'));

    return $properties;
  }

}

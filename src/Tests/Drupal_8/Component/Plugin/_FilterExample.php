<?php

/**
 * @file
 * Contains \Drupal\filter_example\Plugin\Filter\FilterExample.
 */

namespace Drupal\filter_example\Plugin\Filter;

use Drupal\filter\Plugin\FilterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\filter\FilterProcessResult;

/**
 * Example of filter plugin.
 *
 * @Filter(
 *   id = "filter_example",
 *   title = @Translation("Filter example"),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_HTML_RESTRICTOR,
  *   settings = {
 *     "example_setting" = "foo",
 *   },
 *   weight = -10
 * )
 */
class FilterExample extends FilterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form['example_setting'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Setting label'),
      '#default_value' => $this->settings['example_setting'],
      '#description' => $this->t('Description of the setting.'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    // Do something with the text here.
    $text = str_replace($this->settings['example_setting'], 'bar', $text);
    return new FilterProcessResult($text);
  }

  /**
   * {@inheritdoc}
   */
  public function tips($long = FALSE) {
    return $this->t('Place your filter tips here.');
  }

}

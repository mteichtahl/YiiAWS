<?php

/**
 * YiiAWS Component
 *
 * This is a Yii component (CApplicationComponent)
 * 
 *  @author Marc Teichtahl <marc@teichtahl.com>
 * @copyright Copyright &copy; Marc Teichtahl 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version 1.0.0
 * 
 * @package YiiAMQP
 */
Yii::app()->autoloader->getAutoloader()->addNamespace('PhpAmqpLib\Connection', __DIR__ . '/PhpAmqpLib/Connection');


/**
 * YiiAWS
 *
 * The class is a Yii CApplicationCompontent to be used as a component in Yii applications.
 * 
 *
 * @package    YiiAWS
 * @subpackage Common
 * @author     Marc Teichtahl <marc@teichtahl.com   >
 */
class YiiAWS extends CApplicationComponent {

 
}

?>

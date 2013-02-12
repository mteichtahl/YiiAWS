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

//require 'AWSSDKforPHP/aws.phar';
//use Aws\Common\Enum\Region;
//use Aws\S3\S3Client as S3ClientV2;

Yii::app()->autoloader->getAutoloader()->addNamespace('Aws\S3', __DIR__ . '/aws-sdk/src/Aws/S3');


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

    public $key;
    public $secret;
    public $region;
    
    protected $aws = NULL;
    
    function __construct() {
        
        echo __DIR__ . '/aws-sdk/src/Aws/S3';
        app()->end();
            
        $this->aws = S3Client::factory($config);;
    }
    
    public function  test()
    {
        
        echo '4444';
    }
 
    
}

?>

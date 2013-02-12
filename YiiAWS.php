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
require __DIR__ . '/aws.phar';
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
    protected $config = array();

    public function init() {
        $this->config = array(
            'key' => $this->key,
            'secret' => $this->secret,
            'region' => $this->region
        );

        $this->aws = Aws\S3\S3Client::factory($this->config);


        // Check that the factory created our object
        if (get_class($this->aws) != 'Aws\S3\S3Client')
        {
            throw new CHttpException(404,'Could not create AWS Service.');
        }
        
        return $this->aws;
    }

}

?>

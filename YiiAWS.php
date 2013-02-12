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
require __DIR__.'/aws.phar';

Yii::app()->autoloader->getAutoloader()->addNamespace('Aws\S3', __DIR__ . '/aws-sdk/src/Aws/S3');

/**
 * YiiAWS
 *
 * The class is a Yii CApplicationCompontent to be used as a component in Yii applications.
 * 
 *
 * @package    YiiAWS
 * @subpackage Common
 * @author     Marc Teichtahl <marc@teichtahl.com>
 * 
 * /**
 * Client to interact with Amazon Simple Storage Solution
 *
 * @method Model abortMultipartUpload(array $args = array()) {@command s3 AbortMultipartUpload}
 * @method Model completeMultipartUpload(array $args = array()) {@command s3 CompleteMultipartUpload}
 * @method Model copyObject(array $args = array()) {@command s3 CopyObject}
 * @method Model createBucket(array $args = array()) {@command s3 CreateBucket}
 * @method Model createMultipartUpload(array $args = array()) {@command s3 CreateMultipartUpload}
 * @method Model deleteBucket(array $args = array()) {@command s3 DeleteBucket}
 * @method Model deleteBucketCors(array $args = array()) {@command s3 DeleteBucketCors}
 * @method Model deleteBucketLifecycle(array $args = array()) {@command s3 DeleteBucketLifecycle}
 * @method Model deleteBucketPolicy(array $args = array()) {@command s3 DeleteBucketPolicy}
 * @method Model deleteBucketTagging(array $args = array()) {@command s3 DeleteBucketTagging}
 * @method Model deleteBucketWebsite(array $args = array()) {@command s3 DeleteBucketWebsite}
 * @method Model deleteObject(array $args = array()) {@command s3 DeleteObject}
 * @method Model deleteObjects(array $args = array()) {@command s3 DeleteObjects}
 * @method Model getBucketAcl(array $args = array()) {@command s3 GetBucketAcl}
 * @method Model getBucketCors(array $args = array()) {@command s3 GetBucketCors}
 * @method Model getBucketLifecycle(array $args = array()) {@command s3 GetBucketLifecycle}
 * @method Model getBucketLocation(array $args = array()) {@command s3 GetBucketLocation}
 * @method Model getBucketLogging(array $args = array()) {@command s3 GetBucketLogging}
 * @method Model getBucketNotification(array $args = array()) {@command s3 GetBucketNotification}
 * @method Model getBucketPolicy(array $args = array()) {@command s3 GetBucketPolicy}
 * @method Model getBucketRequestPayment(array $args = array()) {@command s3 GetBucketRequestPayment}
 * @method Model getBucketTagging(array $args = array()) {@command s3 GetBucketTagging}
 * @method Model getBucketVersioning(array $args = array()) {@command s3 GetBucketVersioning}
 * @method Model getBucketWebsite(array $args = array()) {@command s3 GetBucketWebsite}
 * @method Model getObject(array $args = array()) {@command s3 GetObject}
 * @method Model getObjectAcl(array $args = array()) {@command s3 GetObjectAcl}
 * @method Model getObjectTorrent(array $args = array()) {@command s3 GetObjectTorrent}
 * @method Model headBucket(array $args = array()) {@command s3 HeadBucket}
 * @method Model headObject(array $args = array()) {@command s3 HeadObject}
 * @method Model listBuckets(array $args = array()) {@command s3 ListBuckets}
 * @method Model listMultipartUploads(array $args = array()) {@command s3 ListMultipartUploads}
 * @method Model listObjectVersions(array $args = array()) {@command s3 ListObjectVersions}
 * @method Model listObjects(array $args = array()) {@command s3 ListObjects}
 * @method Model listParts(array $args = array()) {@command s3 ListParts}
 * @method Model putBucketAcl(array $args = array()) {@command s3 PutBucketAcl}
 * @method Model putBucketCors(array $args = array()) {@command s3 PutBucketCors}
 * @method Model putBucketLifecycle(array $args = array()) {@command s3 PutBucketLifecycle}
 * @method Model putBucketLogging(array $args = array()) {@command s3 PutBucketLogging}
 * @method Model putBucketNotification(array $args = array()) {@command s3 PutBucketNotification}
 * @method Model putBucketPolicy(array $args = array()) {@command s3 PutBucketPolicy}
 * @method Model putBucketRequestPayment(array $args = array()) {@command s3 PutBucketRequestPayment}
 * @method Model putBucketTagging(array $args = array()) {@command s3 PutBucketTagging}
 * @method Model putBucketVersioning(array $args = array()) {@command s3 PutBucketVersioning}
 * @method Model putBucketWebsite(array $args = array()) {@command s3 PutBucketWebsite}
 * @method Model putObject(array $args = array()) {@command s3 PutObject}
 * @method Model putObjectAcl(array $args = array()) {@command s3 PutObjectAcl}
 * @method Model restoreObject(array $args = array()) {@command s3 RestoreObject}
 * @method Model uploadPart(array $args = array()) {@command s3 UploadPart}
 * @method Model uploadPartCopy(array $args = array()) {@command s3 UploadPartCopy}
 * @method waitUntilBucketExists(array $input) Wait until a bucket exists. The input array uses the parameters of the HeadBucket operation and waiter specific settings
 * @method waitUntilBucketNotExists(array $input) Wait until a bucket does not exist. The input array uses the parameters of the HeadBucket operation and waiter specific settings
 * @method waitUntilObjectExists(array $input) Wait until an object exists. The input array uses the parameters of the HeadObject operation and waiter specific settings
 */
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

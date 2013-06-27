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
 * @see http://docs.aws.amazon.com/aws-sdk-php-2/latest/
 *
 * @package YiiAMQP
 **/
namespace YiiAWS;

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


class AppComponent extends \CApplicationComponent
{

    /**
     * @var array the configuration array, should have key, secret and region keys.
     */
    public $config = array();

    /**
     * @var \Aws\S3\S3Client
     */
    protected $_client;

    /**
     * @param \Aws\S3\S3Client $client
     */
    public function setClient($client)
    {
        $this->_client = $client;
    }

    /**
     * @return \Aws\S3\S3Client
     */
    public function getClient()
    {
        if ($this->_client === null)
            $this->_client = \Aws\S3\S3Client::factory($this->config);
        return $this->_client;
    }

    public function __call($name, $arguments)
    {
        $client = $this->getClient();
        if (method_exists($client, $name))
            return call_user_func_array(array($client, $name), $arguments);
        else
            throw new \Exception(__CLASS__." does not have a method called '$name'");
    }

    public function __get($name)
    {
        $client = $this->getClient();
        if (property_exists($client, $name))
            return $client->{$name};
        else
            return parent::__get($name);
    }

    public function __set($name, $value)
    {
        $client = $this->getClient();
        if (property_exists($client, $name))
            return $client->{$name} = $value;
        else
            return parent::__set($name, $value);
    }

    public function __isset($name)
    {
        $client = $this->getClient();
        if (property_exists($client, $name))
            return isset($client->{$name});
        else
            return parent::__isset($name);
    }

    public function __unset($name)
    {
        $client = $this->getClient();
        if (property_exists($client, $name))
            unset($client->{$name});
        else
            parent::__unset($name);
    }


}

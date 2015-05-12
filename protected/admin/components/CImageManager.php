<?php

/**
 * This application component performs on-the-fly versioning of images.
 * 
 * Your image collections and transformations should be configured from
 * the application configuration array - for example:
 *
 * <pre>
 *  ...
 *  'images'=>array(
 *    'class'=>'CImageManager',
 *    'collections'=>array(
 *      'faces' => 'images/faces',
 *    ),
 *    'transforms'=>array(
 *      'thumbnail' => array(
 *        'crop' => array(128,128),
 *      ),
 *    ),
 *  ),
 *  ...
 * </pre>
 * 
 * In this example, the application component is named "images", and we
 * configured one collection of images named "faces", with files stored
 * in the "images/faces"folder.
 * 
 * We also configured an image transformation named "thumbnail", with
 * cropped versions of images to be stored in "images/faces/thumbs".
 *
 * The image collection name, and the transformation name, are overloaded
 * as members of the image manager and image collections - to generate a
 * thumbnail version of an image named "rasmus.jpg", you would call:
 *
 * <pre>
 * // load an image from the collection named 'faces':
 * $image = Yii::app()->images->faces->load('rasmus.jpg');
 * // apply the transformation named 'thumbnail' and save:
 * $image->thumbnail()->saveJPEG('thumbs/rasmus.jpg');
 * </pre>
 */
class CImageManager extends CApplicationComponent
{
  /**
   * @var array configures collections of images.
   */
  public $collections;
  
  /**
   * @var array configures image transforms.
   */
  public $transforms;
  
  /**
   * @var array CImageCollection instances.
   */
  protected $_collections = array();
  
  /**
   * @var array CImageTransform instances.
   */
  protected $_transforms = array();
  
  /** 
   * Initializes the image manager component.
   */
  public function init()
  {
    if (!isset($this->collections, $this->transforms))
      throw new CException('CImageManager::init() : component configuration is incomplete');
  }
  
  /**
   * Magic accessor for image collections.
   */
  public function __get($name)
  {
    if (!isset($this->collections[$name]))
      return parent::__get($name);
    return $this->getCollection($name);
  }
  
  /**
   * Obtain a CImageCollection instance.
   * @param name string image collection name, as defined by $collections
   */
  protected function getCollection($name)
  {
    if (!isset($this->_collections[$name]))
    {
      if (!isset($this->collections[$name]))
        throw new CException('CImageManager::getCollection() : undefined image collection "'.$name.'"');
      $this->_collections[$name] = new CImageCollection($name, $this->collections[$name], $this);
    }
    return $this->_collections[$name];
  }
  
  /**
   * Obtain a CImageTransform instance.
   * @param name string transformation name, as defined by $collections
   */
  public function getTransform($name)
  {
    if (!isset($this->_transforms[$name]))
    {
      if (!isset($this->transforms[$name]))
        throw new CException('CImageManager::getCollection() : undefined image transformation "'.$name.'"');
      $this->_transforms[$name] = new CImageTransform($name, $this->transforms[$name]);
    }
    return $this->_transforms[$name];
  }
  
  /**
   * This magic method overloads configured image transformations as methods.
   * @return CImage with the named transformation applied.
   */
  public function __call($name, $params)
  {
    $transform = $this->owner->getTransform($name);
    $image = $this->load($params[0]);
    $transform->apply($image);
    return $image;
  }
}

/**
 * This helper-class implements a collection of images.
 */
class CImageCollection
{
  /**
   * @var CImageManager owner instance.
   */
  protected $owner;
  
  /**
   * @var string name of this image collection.
   */
  protected $name;
  
  /**
   * @var string path to the folder containing the source image files for this collection.
   */
  protected $sourcePath;
  
  /**
   * Configures the image collection.
   */
  public function __construct($name, $path, CImageManager $owner)
  {
    $this->owner = $owner;
    $this->name = $name;
    $this->sourcePath = $path;
  }
  
  /**
   * Obtain a CImageFile instance from this collection.
   * @var string souce image filename, relative to $sourcePath.
   */
  public function load($name)
  {
    return CImageFile::load($this->sourcePath.DIRECTORY_SEPARATOR.$name);
  }
}

/**
 * This helper-class implements a single image transformation.
 */
class CImageTransform
{
  /**
   * @var string the name of this image transformation.
   */
  protected $name;
  
  /**
   * @var array Image operations performed by this transformation.
   */
  protected $ops;
  
  /**
   * Initialize this transformation
   */
  public function __construct($name, $ops)
  {
    $this->name = $name;
    $this->ops = $ops;
  }
  
  /**
   * Apply this transformation to the given CImage instance.
   * @var CImage the image to apply this transformation to.
   */
  public function apply(CImage $image)
  {
    foreach ($this->ops as $name => $args)
    {
      call_user_func_array(array($image,$name), $args);
    }
  }
}

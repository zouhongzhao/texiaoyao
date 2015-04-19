<?php

/**
 * CImageFile extends CImage with the capability to load existing images
 * from various file formats.
 * 
 * Note that the constructor is private - to create an instance, use the
 * CImageFile::load() method.
 *
 * This component implements late-loading of image data - the overhead of
 * creating a CImageFile instance is therefore minimal, because nothing is
 * actually loaded when you call CImageFile::load().
 *
 * It also implements late-loading of image metadata, e.g. filetype and
 * image dimensions - using the type, width and height accessors therefore
 * results in minimal overhead, because the image data is not actually loaded.
 */
class CImageFile extends CImage
{
  /**
   * @var path of the loaded image
   */
  protected $_path;
  
  /**
   * Internal constructor
   */
  protected function __construct($path)
  {
    $this->_path = $path;
  }
  
  /**
   * Creates an image from an image handle.
   * @param string the path to the source image file (GIF, JPEG or PNG)
   */
  public static function load($path)
  {
    return new CImageFile($path);
  }
  
  /**
   * Loads image metadata (width, height and type)
   */
  protected function loadData()
  {
		$info = @getimagesize($this->_path);
		if (!is_array($info))
      throw new CException('CImageFile::load() : unsupported image type');
    
    list(
      $this->_width,
      $this->_height,
      $this->_type
    ) = $info;
  }
  
  /**
   * Loads the image (actual image data)
   */
  protected function loadImage()
  {
    $handle=null;
		switch ($this->getType()) {
			case IMAGETYPE_GIF:
				$handle = @imagecreatefromgif($this->_path); break;
			case IMAGETYPE_JPEG:
				$handle = @imagecreatefromjpeg($this->_path); break;
			case IMAGETYPE_PNG:
				$handle = @imagecreatefrompng($this->_path); break;
		}
    if (!$handle)
      throw new CException('ImageFile::loadImage() : unsupported image type');
    $this->_handle = $handle;
    $this->_width = imagesx($handle);
    $this->_height = imagesy($handle);
  }
  
  /**
   * @return image type as a string (e.g. 'gif', 'jpg', 'png', etc.)
   */
  public function getType()
  {
    if (!isset($this->_type))
      $this->loadData();
    return $this->_type;
  }
  
  /**
   * @return image width in pixels
   */
  public function getWidth()
  {
    if (!isset($this->_width))
      $this->loadData();
    return $this->_width;
  }
  
  /**
   * @return image height in pixels.
   */
  public function getHeight()
  {
    if (!isset($this->_height))
      $this->loadData();
    return $this->_height;
  }
  
  /**
   * @return GD image handle
   */
  public function getHandle()
  {
    if (!isset($this->_handle))
      $this->loadImage();
    return $this->_handle;
  }
  
  /**
   * @return path to the current image file.
   */
  public function getPath()
  {
    return $this->_path;
  }
  
  /**
   * This magic method overloads configured image transformations as methods.
   * Transformations are defined by the CImageManager application component.
   * @return CImage with the named transformation applied.
   */
  public function __call($name, $params)
  {
    // note: this is currently hardcoded to expect the application component
    // to be configured with the name "images" - this may not be the optimal
    // way to do this.
    $transform = Yii::app()->images->getTransform($name);
    $transform->apply($this);
    return $this;
  }
  
  /**
   * Saves the current image to a JPEG file with the given path.
   * @param string the path of the file to create.
   * @param int optional, the JPEG compression quality - an integer between 1 (poor quality, small file) and 100 (high quality, large file). If null (default), 'CImageJPEGQuality' will be used, if defined in Yii::app()->params.
   */
  public function saveJPEG($path, $quality=null)
  {
    return parent::saveJPEG($path, $quality);
    $this->_path = $path;
  }
  
}

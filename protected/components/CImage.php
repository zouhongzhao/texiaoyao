<?php

/**
 * CImage encapsulates basic GD functionality in an OOP interface, and
 * adds methods for resizing and cropping images.
 * 
 * Note that the constructor is private - to create a blank image, use
 * the CImage::create() method.
 */
class CImage extends CComponent
{
  /**
   * @var handle GD image handle for use with "image_" functions.
   */
	protected $_handle;
  
  /**
   * @var image width
   */
  protected $_width;
  
  /**
   * @var image height
   */
  protected $_height;
  
  /**
   * @var image type
   */
  protected $_type = IMAGETYPE_JPEG;
  
  /**
   * @var boolean whether the image has been changed after being loaded.
   */
	protected $_dirty = false;
	
  /**
   * Internal constructor.
   * @param handle GD image handle
   */
  protected function __construct($handle)
  {
    $this->_handle = $handle;
    $this->_width = imagesx($handle);
    $this->_height = imagesy($handle);
  }
  
  /**
   * Destructor.
   */
  public function __destruct()
  {
    if (isset($this->_handle)) {
      imagedestroy($this->_handle);
      unset($this->_handle);
    }
  }
  
  /**
   * Create a new, blank image
   * @param width the width of the new image
   * @param height the height of the new image
   */
  public static function create($width, $height)
  {
    return new CImage(
      imagecreatetruecolor($width, $height)
    );
  }
  
  /**
   * @return GD image handle
   */
  public function getHandle()
  {
    return $this->_handle;
  }
  
  /**
   * @return image width in pixels
   */
  public function getWidth()
  {
    return $this->_width;
  }
  
  /**
   * @return image height in pixels.
   */
  public function getHeight()
  {
    return $this->_height;
  }
  
  /**
   * @return image type (a GD IMAGETYPE_ constant)
   */
  public function getType()
  {
    return $this->_type;
  }
  
  /**
   * @return boolean whether or not the image has been changed since it was created.
   */
  public function getDirty()
  {
    return $this->_dirty;
  }
  
  /**
   * @return image file extension as a string (e.g. 'gif', 'jpg', 'png', etc.)
   * @param boolean whether to prepend a dot (.) to the extension or not - defaults to true.
   */
  public function getExtension($include_dot=true)
  {
    return image_type_to_extension($this->getType(), $include_dot);
  }
  
  /**
   * Transformation: constrains the bitmap image to the given dimensions.
   *
   * Note that one of the actual outcome dimensions (either width or height) in most
   * cases will not be exactly what you specified, depending on whether the current
   * image is taller or wider than the requested dimensions.
   * 
   * @param int desired maximum width in pixels.
   * @param int desired maximum height in pixels.
   */
	public function fit($max_w, $max_h) {
		$w = $this->getWidth();
		$h = $this->getHeight();
		
		if ($max_w && $w > $max_w)
    {
			$aspect = $h / $w;
			$w = $max_w;
			$h = $aspect * $max_w;
		}
		
		if ($max_h && $h > $max_h)
    {
			$aspect = $w / $h;
			$h = $max_h;
			$w = $aspect * $max_h;
		}
		
		$w = round($w);
		$h = round($h);
		
		if ($w != $this->getWidth() || $h != $this->getHeight()) {
			$this->resize($w, $h);
		}
	}
  
  /**
   * Crops and constrains the bitmap image to the given dimensions.
   *
   * Some image data (either left/right sides or top/bottom edges) will
   * be discarded by applying this operation.
   *
   * If you specify the optional X and Y center coordinates of the subject
   * in the image, cropping will be centered as closely as possible to
   * that point.
   * 
   * @param int exact width in pixels.
   * @param int exact height in pixels.
   * @param int optional, subject location (range: 0..1 ~ left..right)
   * @param int optional, subject location (range: 0..1 ~ top..bottom)
   */
	public function crop($max_w, $max_h, $center_x=0.5, $center_y=0.5) {
		$w = $this->getWidth();
		$h = $this->getHeight();
		
		$src_aspect = $h / $w;
		$dest_aspect = $max_h / $max_w;
		
		if ($src_aspect > $dest_aspect)
    {
			// * source image is too tall
			$crop_h = round($w * $dest_aspect);
			$crop_w = $w;
			$crop_left = 0;
			$crop_top = min($h-$crop_h,max(0,round($h*$center_y - 0.5*$crop_h)));
		}
    else # if ($dest_aspect > $src_aspect)
    { 
			// * source image is too wide
			$crop_h = $h;
			$crop_w = round($h / $dest_aspect);
			$crop_top = 0;
			$crop_left = min($w-$crop_w,max(0,round($w*$center_x - 0.5*$crop_w)));
		}
		
		$w = $max_w;
		$h = $max_h;
		
		if ($w != $this->getWidth() || $h != $this->getHeight()) {
			$this->_crop($crop_left, $crop_top, $crop_w, $crop_h, $w, $h);
		}
	}
  
  /**
   * Resizes this bitmap to the given width and height in pixels.
   *
   * This method does not preserve aspect ratio - it resizes the image
   * to precisely the width and height specified, and will allow you to
   * distort the image.
   *
   * What you most likely want is the constrain() method instead.
   */
	public function resize($width, $height) {
		$new_handle = imagecreatetruecolor($width, $height);
		
		imagecopyresampled(
			$new_handle, $this->handle,
			0, 0, 0, 0,
			$width, $height,
			imagesx($this->handle), imagesy($this->handle)
		);
		
		imagedestroy($this->handle);
		$this->_handle = $new_handle;
    
    $this->_width = $width;
    $this->_height = $height;
    
		$this->_dirty = true;
	}
  
  /**
   * Internal helper function - crops and resizes in a single operation.
   */
	protected function _crop($left, $top, $width, $height, $new_width = null, $new_height = null) {
		if ($new_width && $new_height)
    {
			// * Crop and resize:
			$new_handle = imagecreatetruecolor($new_width, $new_height);
			
			imagecopyresampled(
				$new_handle, $this->handle,
				0, 0,
				$left, $top,
				$new_width, $new_height,
				$width, $height
			);
      
      $width = $new_width;
      $height = $new_height;
		}
    else
    {
			// * Crop only:
			$new_handle = imagecreatetruecolor($width, $height);
			
			imagecopy(
				$new_handle, $this->handle,
				0, 0,
				$left, $top,
				$width, $height
			);
		}
		
		imagedestroy($this->_handle);
		$this->_handle = $new_handle;
    
    $this->_width = $width;
    $this->_height = $height;
		
		$this->_dirty = true;
	}
	
  /**
   * Saves the current image to a JPEG file with the given path.
   * @param string the path of the file to create.
   * @param int optional, the JPEG compression quality - an integer between 1 (poor quality, small file) and 100 (high quality, large file). If null (default), 'CImageJPEGQuality' will be used, if defined in Yii::app()->params.
   */
  public function saveJPEG($path, $quality=null)
  {
    if (!isset($quality))
      $quality = isset(Yii::app()->params['CImageJPEGQuality']) ? Yii::app()->params['CImageJPEGQuality'] : 85;
    return @imagejpeg(
      $this->_handle,
      $path,
      $quality
    );
  }
  
}

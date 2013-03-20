<?php
class image {
	// Initialize some variables
	private $image;
	private $new_image;

	public $filesize = 0;

	public function __construct($image) {
		
		// Get the info of the image and chech what the MIME-type is
		$image_info = getimagesize($image);
		$type = $image_info[2];

		// Set image with the data to either a PNG or a JPEG
		if ($type == IMAGETYPE_JPEG) {
			$this->image = imagecreatefromjpeg($image);
		}
		elseif ($type == IMAGETYPE_PNG) {
			$this->image = imagecreatefrompng($image);
		}
		// If the image is not a PNG or a JPEG, die
		else {
			die('Image is not in JPEG or PNG format');
		}

	}

	public function resize($resize_width, $resize_height, $crop = true) {

		// Get the original image sizes
		$img_width = imagesx($this->image);
		$img_height = imagesy($this->image);

		// Set the scale the image needs to be resized to
		$scale_w = round($resize_width / $img_width, 3);
		$scale_h = round($resize_height / $img_height, 3);

		// Check which scale is bigger
		if ($scale_w > $scale_h) {
			$scale = round($scale_w, 3);
		}
		else {
			$scale = round($scale_h, 3);
		}

		// Initialize the new size
		$new_height = round($scale * $img_height);
		$new_width = round($scale * $img_width);

		// If the image has to be cropped, check how much pixels must be taken of each side
		if ($crop == true) {
			// Check if the image needs to be cropped broadwise
			if ($new_width > $resize_width) {
				$crop_w -= round(($new_width - $resize_width) / 2);
			}
			else {
				$crop_w = 0;
			}
			
			// Check if the image needs to be cropped heightwise
			if ($new_height > $resize_height) {
				$crop_h -= round(($new_height - $resize_height) / 2);
			}
			else {
				$crop_w = 0;
			}
		}
		else {
			$crop_w = $crop_h = 0;
		}

		// Create the new image from the values given
		$this->new_image = imagecreatetruecolor($resize_width, $resize_height);
		
		// Render the new image
		imagecopyresampled($this->new_image, $this->image, $crop_w, $crop_h, 0, 0, $new_width, $new_height, $img_width, $img_height);

	}

	// Save the image
	public function save($path, $name, $type = 'jpeg') {

		// Set the path and the filename
		$filename = $name.'.'.$type;
		$fullpath = $path.'/'.$filename;

		// If the directory does not exist, create one
		if ( ! is_dir($path)) {
			mkdir($path, 0755, true);
		}

		// Save the image to it's location
		imagejpeg($this->new_image, $fullpath, 80);

		// After saving, these variables are set
		$this->filesize = round(filesize($fullpath) / 1000);
		$this->filename = $filename;
	}

	// Show the just saved image
	public function show() {
		header('Content-Type: image/jpeg');
		imagejpeg($this->new_image);
	}

}
?>
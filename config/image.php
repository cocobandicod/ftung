<?php
function uploadImage($file, $file_name, $maxfile, $uploadDir, $thumbnailWidth, $thumbnailHeight)
{
	// Set max file size in bytes
	$maxFileSize = $maxfile;

	// Set allowed file types
	$allowedFileTypes = array('image/jpeg', 'image/png', 'image/gif');

	// Check if file was uploaded without errors
	if ($file['error'] === UPLOAD_ERR_OK) {
		$filename = $file_name;
		$filetype = $file['type'];
		$filesize = $file['size'];
		$tmpname  = $file['tmp_name'];

		// Check if file type is allowed
		if (in_array($filetype, $allowedFileTypes)) {
			// Check if file size is within allowed limit
			if ($filesize <= $maxFileSize) {
				// Create upload directory if it doesn't exist
				if (!file_exists($uploadDir)) {
					mkdir($uploadDir, 0777, true);
				}

				// Move uploaded file to upload directory
				if (move_uploaded_file($tmpname, $uploadDir . $filename)) {
					// Get image type and create thumbnail
					$imageInfo = getimagesize($uploadDir . $filename);
					$imageType = $imageInfo[2];

					if ($imageType == IMAGETYPE_JPEG) {
						$sourceImage = imagecreatefromjpeg($uploadDir . $filename);
					} elseif ($imageType == IMAGETYPE_PNG) {
						$sourceImage = imagecreatefrompng($uploadDir . $filename);
					} elseif ($imageType == IMAGETYPE_GIF) {
						$sourceImage = imagecreatefromgif($uploadDir . $filename);
					}

					$thumbnailImage = imagecreatetruecolor($thumbnailWidth, $thumbnailHeight);
					imagecopyresampled($thumbnailImage, $sourceImage, 0, 0, 0, 0, $thumbnailWidth, $thumbnailHeight, imagesx($sourceImage), imagesy($sourceImage));

					// Save thumbnail
					$thumbnailName = "thumb_" . $filename;
					if ($imageType == IMAGETYPE_JPEG) {
						imagejpeg($thumbnailImage, $uploadDir . $thumbnailName);
					} elseif ($imageType == IMAGETYPE_PNG) {
						imagepng($thumbnailImage, $uploadDir . $thumbnailName);
					} elseif ($imageType == IMAGETYPE_GIF) {
						imagegif($thumbnailImage, $uploadDir . $thumbnailName);
					}

					// Free up memory
					imagedestroy($sourceImage);
					imagedestroy($thumbnailImage);

					return array('status' => 'success', 'message' => 'Image uploaded and thumbnail created.');
				} else {
					return array('status' => 'error', 'message' => 'Error uploading file.');
				}
			} else {
				return array('status' => 'error', 'message' => 'File size is too large.');
			}
		} else {
			return array('status' => 'error', 'message' => 'Only JPG, PNG, and GIF files are allowed.');
		}
	} else {
		return array('status' => 'error', 'message' => 'Error uploading file.');
	}
}

/*
class Image
{

	function upload_image($form_field, $upload_path, $image_name, $width, $height)
	{
		//image upload
		if(isset($_FILES[$form_field]))
		{
			//get uploading file's extention
			$extention=strtolower($_FILES[$form_field]["type"]);
			
			$exp_del = "."; //end delimiter
			$file_name = $_FILES[$form_field]["name"];
			$file_name = explode($exp_del, $file_name);
			$extention = strtolower(end($file_name));
			
			//validate uploading file
			$validate=$this->validate_uploading_file($form_field, $extention);
			
			if($validate)
			{
				//build path if does not exists
				if(!is_dir($upload_path)){ mkdir($upload_path, 0755); }
				
				//here you can use two types of methods to resize image
				//first one is resize image to the aspect ratio
				//second one is crop image to the provided width and height
				//you can use one of the following two methods to perform above operations
				
				//resize image and save
				$this->create_thumb($_FILES[$form_field]["tmp_name"], $upload_path.$image_name, $width, $height, $extention);
				
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	

	function create_thumb($path_to_image, $path_to_thumb, $thumb_width, $thumb_height, $extention)
	{
		$thumb_width=intval($thumb_width);
		$thumb_height=intval($thumb_height);
		
		$x1_source=0;
		$y1_source=0;
		
		//get uploading image's width and height
		list($width, $height, $img) = $this->get_image_width_height($extention, $path_to_image);
		
		//resize image for the aspect ratio
		if($width > $height)
		{
			if($thumb_height>$thumb_width)
			{
				$new_width=$width;
				$new_height=floor($new_width*($thumb_height/$thumb_width));
				
				$y1_source=floor(($height-$new_height)/2);
			}
			else
			{
				$new_height=$height;
				$new_width=floor($new_height*($thumb_width/$thumb_height));
				
				$x1_source=floor(($width-$new_width)/2);
			}
		}
		else
		{
			if($thumb_height>$thumb_width)
			{
				$new_height=$height;
				$new_width=floor($new_height*($thumb_width/$thumb_height));
				
				$x1_source=floor(($width-$new_width)/2);
			}
			else
			{
				$new_width=$width;
				$new_height=floor($new_width*($thumb_height/$thumb_width));
				
				$y1_source=floor(($height-$new_height)/2);
			}
		}
		
		if($thumb_width > $width)
		{
			$thumb_width=$width;
			$new_width=$width;
			
			$x1_source=0;
		}
		else
		{
			$x1_source=floor(($width-$new_width)/2);
		}
		
		if($thumb_height > $height)
		{
			$thumb_height=$height;
			$new_height=$height;
			
			$y1_source=0;
		}
		else
		{
			$y1_source=floor(($height-$new_height)/2);
		}
		
		$tmp_img=$this->create_temp_image($thumb_width, $thumb_height);
		
		// copy and resize old image into new image
		imagecopyresampled($tmp_img, $img, 0, 0, $x1_source, $y1_source, $thumb_width, $thumb_height, $new_width, $new_height);
		
		$this->save_image($extention, $path_to_thumb, $tmp_img);
	}
	

	function get_image_width_height($extension, $path_to_image)
	{
		$extension=strtolower($extension);
		
		// load image and get image size
		if($extension == "jpg" || $extension == "jpeg")
		{
			$img = imagecreatefromjpeg($path_to_image);
		}
		else if( $extension == "gif")
		{
			$img = imagecreatefromgif($path_to_image);
		}
		else if( $extension == "png")
		{
			$img = imagecreatefrompng($path_to_image);
		}
		
		$width = imagesx($img);
		$height= imagesy($img);
		
		return array($width, $height, $img);
	}
	

	function create_temp_image($width, $height)
	{
		// create a new temporary image
		$tmp_img = imagecreatetruecolor($width, $height);
		
		//making a transparent background for image
		imagealphablending($tmp_img, false);
		$color_transparent = imagecolorallocatealpha($tmp_img, 0, 0, 0, 127);
		imagefill($tmp_img, 0, 0, $color_transparent);
		imagesavealpha($tmp_img, true);
		
		return $tmp_img;
	}
	

	function save_image($extension, $path, $tmp_img)
	{
		$extension=strtolower($extension) ;
		
		// save thumbnail into a file
		if( $extension == "jpg" || $extension == "jpeg" )
		{
			imagejpeg( $tmp_img, $path, 100 );
		}
		else if( $extension == "gif")
		{
			imagegif( $tmp_img, $path, 100 );
		}
		else if( $extension == "png")
		{
			imagepng( $tmp_img, $path, 9 );
		}
	}
	
	function validate_uploading_file($field, $extension)
	{
		//assume uploading file is not a valid image
		$match_found=false;
		
		//set valid file types and extensions for image upload
		$file_types=array();

		$file_types[]=array("type" => "image/jpeg", "ext" => "jpg");
		$file_types[]=array("type" => "image/png", "ext" => "png");
		$file_types[]=array("type" => "image/jpg", "ext" => "jpg");
		$file_types[]=array("type" => "image/gif", "ext" => "gif");

		foreach($file_types as $file_type)
		{
			$this_file_type=strtolower($_FILES[$field]["type"]);
			
			if($this_file_type == strtolower($file_type["type"]) && $extension == strtolower($file_type["ext"]))
			{
				$match_found=true;
				break;
			}
		}
		
		return $match_found;
	}
	

	function is_valid_image($path_to_image)
	{
		//assume uploading file is not a valid image
		$valid = false;
		
		//check if file exists
		if(@file_exists($path_to_image))
		{
			try{
				//validate uploading file
				$image_size = getimagesize($path_to_image);
				
				if(isset($image_size[2]) && in_array($image_size[2], array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
				{
					$valid = true;
				}
			}
			catch(Exception $e)
			{
			}
		}
		
		return $valid;
	}
}
?>
*/
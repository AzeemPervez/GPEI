<?php

// Get the file name and extension
$file_name = $_FILES['fileUpload']['name'];
$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

// Check if the file is a valid file
if (!in_array($file_extension, ['jpg', 'jpeg', 'png'])) {

  // Error!
  echo 'The file is not a valid image file.';
  exit;

}

// Get the ownCloud server URL
$owncloud_server_url = 'https://cloud.eoc.gov.pk/owncloud/s/sHRAONkGHonWdtm';
curl_setopt($ch, CURLOPT_USERPWD, azeem);

// Create a new cURL object
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $owncloud_server_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
  'file' => new CURLFile($_FILES['file']['tmp_name']),
  'filename' => $file_name,
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Execute the cURL request
$response = curl_exec($ch);

// Check the response code
$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Check if the request was successful
if ($response_code === 201) {

  // Success!
  echo 'The file was uploaded successfully!';

} else {

  // Error!
  echo 'The file could not be uploaded.';
  echo '<br>';
  echo 'Error code: ' . $response_code;

}

// Close the cURL object
curl_close($ch);

?>

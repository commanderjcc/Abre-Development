<?php

	/*
	* Copyright (C) 2016-2019 Abre.io Inc.
	*
	* This program is free software: you can redistribute it and/or modify
    * it under the terms of the Affero General Public License version 3
    * as published by the Free Software Foundation.
	*
    * This program is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU Affero General Public License for more details.
	*
    * You should have received a copy of the Affero General Public License
    * version 3 along with this program.  If not, see https://www.gnu.org/licenses/agpl-3.0.en.html.
    */

	//Required configuration files
	require_once(dirname(__FILE__) . '/../../core/abre_verification.php');
	require_once(dirname(__FILE__) . '/../../core/abre_functions.php');
	require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
	$portal_root = getConfigPortalRoot();

	$cloudsetting = getenv("USE_GOOGLE_CLOUD");
	if ($cloudsetting=="true")
		require(dirname(__FILE__). '/../../vendor/autoload.php');
	use Google\Cloud\Storage\StorageClient;

	//Check for feed image
	if($image != ""){

		$storage = new StorageClient([
			'projectId' => getenv("GC_PROJECT")
		]);
		$bucket = $storage->bucket(getenv("GC_BUCKET"));

		//Determine if Custom or Feed Post
		if ($type=="custom"){
			$cloud_file = "private_html/stream/cache/images/$image";

			$query = "SELECT COUNT(*) FROM streams_cache WHERE link = '$image'";
			$dbreturn = $db->query($query);
			$resultrow = $dbreturn->fetch_assoc();
			$stream_exists = $resultrow["COUNT(*)"];

			if ($stream_exists > 0) {
				$fileExtension = pathinfo($image, PATHINFO_EXTENSION);
				$image = $portal_root."/modules/stream/stream_serve_image.php?file=$image&ext=$fileExtension";
			}
			else
			{
				// Also check bucket exists for situation that the image is there, but it was placed
				// in the bucket before we wrote to streams_cache
				if ($bucket->object($cloud_file)->exists()){
					$fileExtension = pathinfo($image, PATHINFO_EXTENSION);
					$image = $portal_root."/modules/stream/stream_serve_image.php?file=$image&ext=$fileExtension";
				}
				else {
					$image = "";
				}
			}
		}
		else
		{
			//Make sure image is over http or https
			$url = parse_url($image);
			if($url['scheme'] == 'https' xor $url['scheme'] == 'http'){

				//Get the name and sanitize the file name
				$fileExtension = pathinfo($image, PATHINFO_EXTENSION);
				$fileExtension = substr($fileExtension, 0, 3);
				if($fileExtension == "jpe"){ $fileExtension="jpeg"; }
				$imagefile = $date."_rss.$fileExtension";

				$cloud_file = "private_html/stream/cache/images/$imagefile";

				$query = "SELECT COUNT(*) FROM streams_cache WHERE link = '$imagefile'";
				$dbreturn = $db->query($query);
				$resultrow = $dbreturn->fetch_assoc();
				$stream_exists = $resultrow["COUNT(*)"];

				//If it already saved, read from local server
				// Not using bucket exists for performance reasons
				//if ($bucket->object($cloud_file)->exists()){
				if ($stream_exists > 0) {
					$image = $portal_root."/modules/stream/stream_serve_image.php?file=$imagefile&image=$imagefile&ext=$fileExtension";
					/*
					$info = $bucket->object($cloud_file)->info();
					if ($info['size'] < 1000) {
						$image = "";
					}
					*/
				}else{
					$handle = curl_init($image);
					curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 2);
					curl_setopt($handle, CURLOPT_TIMEOUT, 2);
					curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
					$response = curl_exec($handle);
					$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
					curl_close($handle);

					if($httpCode != 200) {
					    $image = "";
					}else{
						//Make sure file is an image
						if(@exif_imagetype($image)){
							$remote_file = $image;

							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $remote_file);
							curl_setopt($ch, CURLOPT_HEADER, 0);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
							$picture = curl_exec($ch);
							$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
							curl_close($ch);

							$options = [
								'resumable' => true,
								'name' => $cloud_file,
								'metadata' => [
									'contentLanguage' => 'en',
									'contentType' => $contentType
								]
							];

							//Resize image
							$picture = ResizeGCImage($picture, "1000", "90");

							$object = $bucket->upload(
								$picture,
								$options
							);

							$stmt = $db->stmt_init();
							$sql = "INSERT INTO streams_cache (link) VALUES (?)";
							$stmt->prepare($sql);
							$stmt->bind_param("s", $imagefile);
							$stmt->execute();
							$stmt->close();

						}else{
							$image = "";
						}
					}
				}
			}
		}
	}
?>

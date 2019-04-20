<?php
/**----------------------------------------------------------------------------------
* Microsoft Developer & Platform Evangelism
*
* Copyright (c) Microsoft Corporation. All rights reserved.
*
* THIS CODE AND INFORMATION ARE PROVIDED "AS IS" WITHOUT WARRANTY OF ANY KIND, 
* EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE IMPLIED WARRANTIES 
* OF MERCHANTABILITY AND/OR FITNESS FOR A PARTICULAR PURPOSE.
*----------------------------------------------------------------------------------
* The example companies, organizations, products, domain names,
* e-mail addresses, logos, people, places, and events depicted
* herein are fictitious.  No association with any real company,
* organization, product, domain name, email address, logo, person,
* places, or events is intended or should be inferred.
*----------------------------------------------------------------------------------
**/

/** -------------------------------------------------------------
# Azure Storage Blob Sample - Demonstrate how to use the Blob Storage service. 
# Blob storage stores unstructured data such as text, binary data, documents or media files. 
# Blobs can be accessed from anywhere in the world via HTTP or HTTPS. 
#
# Documentation References: 
#  - Associated Article - https://docs.microsoft.com/en-us/azure/storage/blobs/storage-quickstart-blobs-php 
#  - What is a Storage Account - http://azure.microsoft.com/en-us/documentation/articles/storage-whatis-account/ 
#  - Getting Started with Blobs - https://azure.microsoft.com/en-us/documentation/articles/storage-php-how-to-use-blobs/
#  - Blob Service Concepts - http://msdn.microsoft.com/en-us/library/dd179376.aspx 
#  - Blob Service REST API - http://msdn.microsoft.com/en-us/library/dd135733.aspx 
#  - Blob Service PHP API - https://github.com/Azure/azure-storage-php
#  - Storage Emulator - http://azure.microsoft.com/en-us/documentation/articles/storage-use-emulator/ 
#
**/

require_once 'vendor/autoload.php';
require_once 'azure.php';
$azure = new Computer_Vision();

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;

$connectionString = "DefaultEndpointsProtocol=https;AccountName=blobrplpolbeng;AccountKey=QfKxSlEXpvkKv+ccGx3z2JZfyJOZGCxKGmIiRZLmi+rWlcG8AaxGN1/H1H9jBZugzuBULqllhcTjmvFy2j2ySw==";

// Create blob client.
$blobClient = BlobRestProxy::createBlobService($connectionString);

// Create container options object.
$createContainerOptions = new CreateContainerOptions();

// Set public access policy. Possible values are
// PublicAccessType::CONTAINER_AND_BLOBS and PublicAccessType::BLOBS_ONLY.
// CONTAINER_AND_BLOBS:
// Specifies full public read access for container and blob data.
// proxys can enumerate blobs within the container via anonymous
// request, but cannot enumerate containers within the storage account.
//
// BLOBS_ONLY:
// Specifies public read access for blobs. Blob data within this
// container can be read via anonymous request, but container data is not
// available. proxys cannot enumerate blobs within the container via
// anonymous request.
// If this value is not specified in the request, container data is
// private to the account owner.
$createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);

// Set container metadata.
$createContainerOptions->addMetaData("key1", "value1");
$createContainerOptions->addMetaData("key2", "value2");

$containerName = "pinjolbblobs";

if(isset($_POST["submit"])) {
    $fileToUpload = $_FILES["photo"]["name"];

    try {
        
        $content = fopen($_FILES["photo"]["tmp_name"], "r");

        //Upload blob
        $blobClient->createBlockBlob($containerName, $fileToUpload, $content);

        $_SESSION['containerName'] = $containerName;
        $_SESSION['fileToUpload'] = $fileToUpload;

        // header("location: cek-blacklist.php");

    }
    catch(ServiceException $e){
        // Handle exception based on error codes and messages.
        // Error codes and messages are here:
        // http://msdn.microsoft.com/library/azure/dd179439.aspx
        $code = $e->getCode();
        $error_message = $e->getMessage();
        echo $code.": ".$error_message."<br />";
    }
    catch(InvalidArgumentTypeException $e){
        // Handle exception based on error codes and messages.
        // Error codes and messages are here:
        // http://msdn.microsoft.com/library/azure/dd179439.aspx
        $code = $e->getCode();
        $error_message = $e->getMessage();
        echo $code.": ".$error_message."<br />";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Data Pengaju</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="asset/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
        /* Show it is fixed to the top */
        body {
        min-height: 75rem;
        padding-top: 4.5rem;
        }

        html,
        body {
        overflow-x: hidden; /* Prevent scroll on narrow devices */
        }

        body {
        padding-top: 56px;
        }

        @media (max-width: 767.98px) {
        .offcanvas-collapse {
            position: fixed;
            top: 56px; /* Height of navbar */
            bottom: 0;
            width: 100%;
            padding-right: 1rem;
            padding-left: 1rem;
            overflow-y: auto;
            background-color: var(--gray-dark);
            transition: -webkit-transform .3s ease-in-out;
            transition: transform .3s ease-in-out;
            transition: transform .3s ease-in-out, -webkit-transform .3s ease-in-out;
            -webkit-transform: translateX(100%);
            transform: translateX(100%);
        }
        .offcanvas-collapse.open {
            -webkit-transform: translateX(-1rem);
            transform: translateX(-1rem); /* Account for horizontal padding on navbar */
        }
        }

        .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
        }

        .nav-scroller .nav {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        color: rgba(255, 255, 255, .75);
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
        }

        .nav-underline .nav-link {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: .875rem;
        color: var(--secondary);
        }

        .nav-underline .nav-link:hover {
        color: var(--blue);
        }

        .nav-underline .active {
        font-weight: 500;
        color: var(--gray-dark);
        }

        .text-white-50 { color: rgba(255, 255, 255, .5); }

        .bg-purple { background-color: var(--purple); }

        .border-bottom { border-bottom: 1px solid #e5e5e5; }

        .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }

        .lh-100 { line-height: 1; }
        .lh-125 { line-height: 1.25; }
        .lh-150 { line-height: 1.5; }

    </style>
  </head>

  <body>
    <!-- Menu Navigasi -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Modulku Fintech</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Ajukan Peminjaman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show.php">Daftar Pengaju</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cek-blacklist.php">Cek Daftar Hitam</a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
      <img class="mr-3" src="https://image.flaticon.com/icons/svg/1632/1632692.svg" alt="" width="48" height="48">
        <div class="lh-100">
          <h6 class="mb-0 text-white lh-100">Periksa List Daftar Hitam</h6>
          <small>Data Terupdate : <?php echo date("l j F Y h:i:s A") ?></small>
        </div>
      </div>
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <?php
                    try {
                        $blobRestProxy = BlobRestProxy::createBlobService($connectionString);
                        $listBlobsOptions = new ListBlobsOptions();
                        $blob_list = $blobRestProxy->listBlobs($containerName, $listBlobsOptions);
                        $blobs = $blob_list->getBlobs();
                        foreach($blobs as $blob) {
                            $celebrity = $azure->recognize($blob->getUrl(),"image");
                            echo '<div class="media text-muted pt-3">';
                            echo '<img src="'.$blob->getUrl().'" alt="" class="mr-2 rounded" height="128" width="128">';
                            echo $celebrity.'</div>';
                            
                        }
                    }
                    catch(Exception $e){
                    $code = $e->getCode();
                        $error_message = $e->getMessage();
                        echo $code.": ".$error_message."<br />";
                    }  
                ?>
            </div>

    </main>

  </body>
</html>

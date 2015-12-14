<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>

        <link rel="stylesheet" href="css/styles.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    </head>

    <?php
    require_once './autoload.php';
    $logout = filter_input(INPUT_GET, 'logout');
    if ($logout == true) {
        $_SESSION['user_id'] = null;
    }
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php');
    } else if (isset($_SESSION['user_id'])) {
        echo '<div><a href="?logout=true">Logout</a></div>';
    }
    ?>



    <body>
        <div class="container"><h2>Upload Page</h2></div>  

        <h2>Image Files</h2>
        <p>
            <a href="view.php">View Images</a>
        </p>
        <p>
        <form>
            <input type="text" placeholder="Meme Top text" name="memetop" value="" required="required" /> <br />
            <input type="text" placeholder="Meme Botom text" name="memebottom" value="" required="required" /> 
            <br />
            <input type="reset" />
            <input type="button" value="Submit" />
        </form>

    </p> 
    <div id="files-img">
        <p>Drag an image file from your computer here</p>
        <p>or</p>
        <p><input type="file" name="picked" /></p> 
    </div>
    <div class="progress"></div>
    <pre id="img-file-content"></pre>
    <script type="text/javascript">
        /*
         switch(fileList[0].type) {
         case 'image/png': 
         case 'image/gif': 
         case 'image/jpeg': 
         case 'image/pjpeg':
         case 'text/plain':
         case 'text/html':
         case 'application/x-zip-compressed':
         case 'application/pdf':
         case 'application/msword':
         case 'application/vnd.ms-excel':
         case 'video/mp4':
         case 'audio/mp3':
         case 'audio/mpeg':
         break;
         default:
         'Unsupported file type!';
         return false;
         }
         */
        // call initialization file
        if (window.File && window.FileList && window.FileReader) {
            document.addEventListener("DOMContentLoaded", Init);
        }

        var dropZoneImg = document.querySelector('#files-img');
        var fileUpload = document.querySelector('input[name="picked"]');
        var fileContentPaneImg = document.querySelector('#img-file-content');
        var uploadProgress = document.querySelector('.progress');
        var memeTopText = document.querySelector('input[name="memetop"]');
        var memeBottomText = document.querySelector('input[name="memebottom"]');
        var SubmitBtn = document.querySelector('input[type="button"]');

        var imageReady = false,
                fileToUpload;

        function Init() {
            // Event Listener for when the dragged file is over the drop zone.
            dropZoneImg.addEventListener('dragover', function (e) {
                if (e.preventDefault)
                    e.preventDefault();
                if (e.stopPropagation)
                    e.stopPropagation();

                e.dataTransfer.dropEffect = 'copy';
            });

            // Event Listener for when the dragged file enters the drop zone.
            dropZoneImg.addEventListener('dragenter', function (e) {
                this.classList.add('over');
            });

            // Event Listener for when the dragged file leaves the drop zone.
            dropZoneImg.addEventListener('dragleave', function (e) {
                this.classList.remove('over');
            });

            // Event Listener for when the dragged file dropped in the drop zone.
            dropZoneImg.addEventListener('drop', function (e) {
                if (e.preventDefault)
                    e.preventDefault();
                if (e.stopPropagation)
                    e.stopPropagation();

                this.classList.remove('over');

                var fileList = e.dataTransfer.files;
                var textType = /image\/[jpeg|png|gif]/;

                if (fileList.length > 0) {
                    console.log(fileList[0]);

                    if (fileList[0].size > 10000000) {
                        fileContentPaneImg.innerHTML = "Exceeded filesize limit.";
                        imageReady = false;
                    } else if (fileList[0].type.match(textType)) {
                        readTexImg(fileList[0]);
                    } else {
                        fileContentPaneImg.innerHTML = "File not supported!";
                        imageReady = false;
                    }
                }

            });

            fileUpload.addEventListener("change", function () {
                var fileList = this.files;
                var textType = /image\/[jpeg|png|gif]/;

                if (fileList.length > 0) {
                    if (fileList[0].size > 10000000) {
                        fileContentPaneImg.innerHTML = "Exceeded filesize limit.";
                        imageReady = false;
                    } else if (fileList[0].type.match(textType)) {
                        readTexImg(fileList[0]);
                    } else {
                        fileContentPaneImg.innerHTML = "File not supported!";
                        imageReady = false;
                    }
                }
            });

            SubmitBtn.addEventListener("click", uploadImage);

        }
        ;
        // Read the contents of a file.
        function readTexImg(file) {
            var readerimg = new FileReader();

            readerimg.onloadend = function (e) {
                if (e.target.readyState == FileReader.DONE) {
                    var img = new Image();
                    img.src = readerimg.result;
                    fileContentPaneImg.innerHTML = '';
                    fileContentPaneImg.appendChild(img);
                    imageReady = true;
                    fileToUpload = file;
                }
            };

            readerimg.readAsDataURL(file);

        }

        function uploadImage() {
            if (imageReady === true) {
                makeAJAXCall(fileToUpload);
            }
        }

        /*
         * Need extra help visit
         * https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/Using_XMLHttpRequest
         */

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.addEventListener("progress", updateProgress, false);
        xmlhttp.addEventListener("load", transferComplete, false);


        function makeAJAXCall(data) {
            var verb = 'POST';
            var url = 'upload.php';
            var formData = new FormData();
            formData.append('upfile', data);
            formData.append(memeTopText.name, memeTopText.value);
            formData.append(memeBottomText.name, memeBottomText.value);

            xmlhttp.open(verb, url, true);
            xmlhttp.send(formData);

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState === 4) {

                    var status = (xmlhttp.status === 200 ? "success" : "failure");
                    var response = JSON.parse(xmlhttp.responseText);
                    uploadProgress.innerHTML = response.message;

                    var img = new Image();
                    img.src = response.location;
                    fileContentPaneImg.innerHTML = '';
                    fileContentPaneImg.appendChild(img);


                } else {
                    // waiting for the call to complete
                }
            };

        }


        function updateProgress(e) {
            if (e.lengthComputable) {
                uploadProgress.innerHTML = Math.ceil(e.loaded / e.total) * 100 + '%';
                ;
            } else {
                // Unable to compute progress information since the total size is unknown
            }
        }

        function transferComplete(e) {
            //uploadProgress.innerHTML = 'The transfer is complete.';
        }



    </script>
</body>
</html>

<?php
$configs = include('config/config.php');


$data = $configs['xmldir'].'template.xml';

if(file_exists($data)){
    $entries = file_get_contents($data);
    $xml = simplexml_load_string($entries);

    $ns = $xml->getNamespaces(true);

    $name = $xml->children($ns['my'])->employee->employeeName;
    $employeedepartment = $xml->children($ns['my'])->employee->employeeDepartment;

    $id = $xml->children($ns['my'])->assets->asset->assetID;
    $desc = $xml->children($ns['my'])->assets->asset->assetDescription;
    $make = $xml->children($ns['my'])->assets->asset->assetMake;
    $model = $xml->children($ns['my'])->assets->asset->assetModel;
    $sn = $xml->children($ns['my'])->assets->asset->assetSerialNumber;
    $assignedto = $xml->children($ns['my'])->assets->asset->assetAssignedTo;
    $department = $xml->children($ns['my'])->assets->asset->assetDepartment;
    $location = $xml->children($ns['my'])->assets->asset->assetLocation;
    $cat = $xml->children($ns['my'])->assets->asset->assetCategory;
    $notes = $xml->children($ns['my'])->assets->asset->assetNotes;
}
else{
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>XSN to CAB Converter</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="py-5 text-center">
        <h2>Submit XSN file form</h2>
        <p class="lead">Below is an example form built for converting, parsing and viwing XSN file's template.xml.</p>
    </div>

    <div class="row" id="parsed">


        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Template.xml</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">employeeName</h6>
                    </div>
                    <span class="text-muted"><?php echo $name; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">employeeDepartment</h6>
                    </div>
                    <span class="text-muted"><?php echo $employeedepartment; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">assetID</h6>
                    </div>
                    <span class="text-muted"><?php echo $id; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">assetDescription</h6>
                    </div>
                    <span class="text-muted"><?php echo $desc; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">assetMake</h6>
                    </div>
                    <span class="text-muted"><?php echo $make; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">assetModel</h6>
                    </div>
                    <span class="text-muted"><?php echo $model; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">assetSerialNumber</h6>
                    </div>
                    <span class="text-muted"><?php echo $sn; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">assetAssignedTo</h6>
                    </div>
                    <span class="text-muted"><?php echo $assignedto; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">assetDepartment</h6>
                    </div>
                    <span class="text-muted"><?php echo $department; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">assetLocation</h6>
                    </div>
                    <span class="text-muted"><?php echo $location; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">assetCategory</h6>
                    </div>
                    <span class="text-muted"><?php echo $cat; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">assetNotes</h6>
                    </div>
                    <span class="text-muted"><?php echo $notes; ?></span>
                </li>

            </ul>
        </div>

















        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">User info</h4>
            <p class="statusMsg"></p>

            <form enctype="multipart/form-data" id="fupForm" >
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">EMAIL</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required />
                </div>
                <hr class="mb-4">
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control" id="file" name="file" required />
                </div>
                <hr class="mb-4">
                <input type="submit" name="submit" class="btn btn-danger submitBtn" value="Submit"/>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2018</p>
    </footer>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/holder.min.js"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>


<script>
    $(document).ready(function(e){
        $("#fupForm").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'action/upload.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('.submitBtn').attr("disabled","disabled");
                    $('#fupForm').css("opacity",".5");
                },
                success: function(msg){
                    $('.statusMsg').html('');
                    if(msg == 'ok'){
                        $('#fupForm')[0].reset();
                        $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');

                        window.location.reload(true);
                    }else{
                        $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                    }
                    $('#fupForm').css("opacity","");
                    $(".submitBtn").removeAttr("disabled");
                }
            });
        });

        /*            //file type validation
                    $("#file").change(function() {
                        var file = this.files[0];
                        var imagefile = file.type;
                        console.log(file);
                        var match= ["image/jpeg","image/png","image/jpg"];
                        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
                            alert('Please select a valid image file (JPEG/JPG/PNG).');
                            $("#file").val('');
                            return false;
                        }
                    });*/
    });
</script>


</body>
</html>

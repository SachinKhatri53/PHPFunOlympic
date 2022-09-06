<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/de23b03d2b.js" crossorigin="anonymous"></script>
    <style>
    .image-row {
        display: flex;
        flex-wrap: wrap;
        padding: 0 4px;
    }

    /* Create four equal columns that sits next to each other */
    .image-column {
        flex: 15%;
        max-width: 25%;
        padding: 0 4px;
        height: 200px;
        margin-bottom: 10px;
    }

    .image-column img {
        margin-top: 8px;
        vertical-align: middle;
        width: 100%;
        height: 100%;
    }
    </style>
</head>

<body>
    <div class='container'>
        <div class='image-row'>
            <div class='image-column'>
                <img src='images/1660825762august-phlieger-CREqtqgBFcU-unsplash.jpg' data-toggle="modal" data-target="#imageModal"
                                style="cursor:pointer">
            </div>
        </div>
        <div class='modal fade' id='imageModal' tabindex='-1' role='dialog' aria-labelledby='imageModalLabel'
            aria-hidden='true'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='imageModalLabel'>Image</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>

                    </div>
                    <div class="modal-body">
                        <img src='images/1660825762august-phlieger-CREqtqgBFcU-unsplash.jpg' alt='' style='width:100%; height:400px; object-fit:contain'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
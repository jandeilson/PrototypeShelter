<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dashboard - PrototypeShelter by JDeS</title>

    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <section id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <h1><?php echo $companyName; ?></h1>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </section>
    <section id="prototypeUpload">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form id="form" action="" method="POST" enctype="multipart/form-data" class="uploadPrototype">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Prototype name</label>
                                    <input type="text" class="form-control" id="prototype" name="prototype" placeholder="">
                                    <div id="prototype-group"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group select-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category">
                                        <option selected="" disabled=""></option>
                                        <option value="Website">Website</option>
                                        <option value="Landing Page">Landing page</option>
                                        <option value="Logo">Logo</option>
                                        <option value="App">App</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <div id="category-group"></div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="name">Version</label>
                                    <input type="number" class="form-control" id="prototypeVersion" name="prototypeVersion" value="0" min="0" max="100" placeholder="">
                                    <div id="prototype-group"></div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="dragFileUpload">
                                <span class="title dragHere"></span>
                                <ul class="description dragHere">
                                    <li>PNG</li>
                                    <li>JPG</li>
                                    <li>JPEG</li>
                                    <li>GIF</li>
                                    <li>SVG</li>
                                </ul>
                                <div class="btn-block btn dragHere">
                                    Upload prototype
                                </div>
                                <input type="file" id="fileImage" name="fileImage">
                            </div>
                            <div id="fileimage-group"></div>
                        </div>
                        <div class="progress">
                            <div class="bar"></div>
                            <div class="percent">0%</div>
                        </div>
                        <!--<input class="btn btn-success" type="submit" value="Upload">-->
                    </form>
                </div>
                <div class="offset-md-1 col-md-5">
                    <div class="table-wrapper-scroll-y">
                        <table class="table header-fixed">
                            <thead>
                                <tr>
                                    <th scope="col">Prototype</th>
                                    <th scope="col">Version</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="listPrototypes">
                                <?php require_once 'inc/data.php'; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div>
            by <a href="https://github.com/jandeilson/prototypeshelter" title="Jandeilson De Sousa">JDeS</a>
        </div>
    </footer>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.form.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
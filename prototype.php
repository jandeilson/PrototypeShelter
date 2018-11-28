<?php
require_once 'config.php';
require_once 'inc/conn.php';

$prototype = $_GET["prototype"];
$prototypeVersion = $_GET["version"];

$fetch = $conn->prepare("SELECT * FROM prototypeshelter_JDeS WHERE prototype = ? AND version = ?");
   
if (isset($_GET['prototype'], $_GET['version'])) {

    $fetch->execute(array($prototype, $prototypeVersion));

    $result = $fetch->fetch();

    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <!-- by JDeS (https://github.com/jandeilson/prototypeshelter) -->
    <meta charset="UTF-8">
    <title><?php echo $result['prototype']; ?> | Prototype - <?php echo $companyName; ?></title>
    
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        padding: 0;
        margin: 0;
    }
    #prototype img {
        width: 100%;
        max-width: 100%;
        position: absolute;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }
    
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 5px solid #BD0052;
        text-align: center;
        width: 50%;
    }
    
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
    </style>
    </head>
    
    <body>
        <section id="prototype">
            <img src="<?php echo '//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/uploads/'.$result['fileName']; ?>">
        </section>
        
        <div id="warningModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <p>*** This is a prototype preview image! ***</p>
          </div>
        
        </div>
        
        <script>
        window.addEventListener('load', function() {
            var modal = document.getElementById('warningModal');

            modal.style.display = "block";

            var span = document.getElementsByClassName("close")[0];
            
            span.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
        </script>
    </body>
    
    </html>
    <?php
        
} else {
    echo "Prototype not found.";
}
?>
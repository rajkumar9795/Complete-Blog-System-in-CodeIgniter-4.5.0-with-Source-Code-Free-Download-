<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />

 

    <meta name="viewport" content="width=device-width, initial-scale=1.0">     <title>Login </title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style type="text/css">

        body {

            background-color: #a7d4d4;

        } 

        .glogin {

            background-color: white;

            margin: auto;

            width: 350px;

            border: solid 1px #218d8d;

            padding: 5px;

            border-radius: 5px;

            margin-bottom: 4%;

        } 

        @media(max-width:1000px) {

            .glogin {

                width: 300px;

            }

        } 

        .glogin:hover {

            box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);

        } 

        .gtxt {

            border: none;

            border-bottom: solid 1px #a7d4d4;

            width: 80%;

            display: block;

            margin: auto;

            padding: 5px;

        } 

            .gtxt:hover {

                border-bottom: solid 2px #034b4b;

            }

 

        .gbtn {

            margin-bottom: 10px;

        }

    </style>

</head>

<body>

    <div class="container-fluid">

        <br /><br /><br />

        <h2 style="text-align: center;">
            Login Page
        </h2>
<br>
        <div class="glogin">

            <br />

            <span style="text-align:center;display:block"></span><hr /><br />

            <form action="<?php echo site_url('login'); ?>" method="post">

                <?= csrf_field() ?>
                <?php if(session()->getFlashdata('msg')) :?>
                    <div class="alert alert-danger">
                       <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
                <input type="text" required autofocus name="Username" class="gtxt " placeholder="User Name" /><br /><br />

                <input type="password" required name="Pass" id="Pass" placeholder="Password" class="gtxt" />

                <input type="checkbox" onclick="myFunction()" style="margin-left:10%;margin-top:10px;">Show Password<br /><br />

                <p style="text-align:center">

                    <input type="submit" value="Login" class="btn btn-info gbtn" />

                    <a href="<?php echo site_url('/'); ?>">

                        <input type="button" value="Cancel" class="btn btn-danger gbtn" />

                    </a><br />

 

                </p>
<?php if (session()->getFlashdata('error')): ?>
    <p style="color:red;text-align: center;"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>
            </form>

        </div>

    </div>

    <script>

        function myFunction() {

            var x = document.getElementById("Password");

            if (x.type === "password") {

                x.type = "text";

            } else {

                x.type = "password";

            }

        }

    </script>

</body>

</html>


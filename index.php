<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/style.css" />

    <title>Bouncing Ball Loading Screen</title>
</head>

<body>
    <div class="spinner">
        <div class="ball"></div>
        <div class="text">Loading</div>
    </div>
    <script>
        setTimeout(function(){
			window.location.href = "page1.php";
		}, 5000); 
    </script>
    </script>
</body>

</html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.btn').click(function(){
  
            var color = ['green','pink','blue','orange','purple'];
            
            var index = Math.floor(Math.random() * 5);
            $('.red').css('border-color',color[index]);
            
            var index = Math.floor(Math.random() * 5);
            $('.red').css('background',color[index]);

            var index = Math.floor(Math.random() * 5);
            //$('.red').css('color',color[index]);

        });
    });
    </script>
</head>
<body>
    <div class="div-wrapper">
        <div class="div red">блок</div>
        <div class="btn"></div>
    </div>
</body>
<?php
    //echo "1";
?>
<?php
include "templates/header.php"; ?>

<style>
    body{
        background-repeat: no-repeat;
        background-size: 2000px;
        background-position: 10% 15%;
    }
    @media only screen and (max-width: 900px) {
        body{
            background-size: 1400px;
        }
    }
</style>
<script>
    var i=0;
    var imagini = [];
        imagini[0] = "media/poze/slideshow/1.jpeg";
        imagini[1] = "media/poze/slideshow/2.jpeg";
        imagini[2] = "media/poze/slideshow/3.jpeg";
        imagini[3] = "media/poze/slideshow/4.jpeg";
        imagini[4] = "media/poze/slideshow/5.jpeg";
    slideshow();
    function slideshow(){
        if(i==4 || i==1){
            document.body.style.backgroundPosition="70% 0%";
    }
        document.body.style.backgroundImage="url("+imagini[i]+")";
        if(i<imagini.length - 1){
            i++;
        }else{
            i=0;
        }
        setTimeout(slideshow,5000);
   
}


</script>


<?php include "templates/footer.php";
?>

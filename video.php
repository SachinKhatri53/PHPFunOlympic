<?php
if(isset($_GET['category'])){
    $category_name = $_GET['category'];
}
?>
<title>HomePage: Enjoy every sports</title>
<?php include "header.php"?>
<div class="row" style="margin-top:90px;">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <form action="search.php" method="post">
        <div class="input-group">
            <input type="search" required name="search" id="" class="form-control" placeholder="Search" autocomplete="on">
            <button type="submit" name="btn-search" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
        </form>
    </div>
</div>

<div class="row justify-content-center" style="color:#ea540a;">
    <h2>
        <?php
        if (!empty($category_name)){
            echo $category_name;
        }
        else{
            if(isset($_GET['live'])){
                echo "Live Videos";   
            }
            else{
                echo "Uploaded Videos";
            
            }
        }
        ?>
    </h2>
</div>
<?php 
if(empty(isset($_GET['live']))){
    include "category_filter.php";  
} ?>
<div class="row" style="padding:20px 50px">
    <?php
    if(empty($category_name)){
        if(isset($_GET['live'])){
            fetch_live_videos();
        }
        else{
            fetch_highlights();
        }
        
    }
    else{
        fetch_videos_by_categories($category_name);
        }?>


</div>
<?php include "footer.php"?>
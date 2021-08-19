<?php 

$title = (empty($content['TITLE'])) ? '': $content['TITLE'];
$desc = (empty($content['DESC'])) ? '': $content['DESC'];

?>


<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10"><?= $title; ?></h5>
                    <p class="m-b-0"><?= $desc; ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <?php 

                        if( ! empty($content['ITEM']))
                        {
                            foreach($content['ITEM'] as $key=>$value)
                            {
                                echo '<li class="breadcrumb-item"><a href="' . $value['LINK'] . '">' . $value['DESC'] . '</a></li>';
                            }
                        }

                    ?>
                </ul>
            </div>
        </div>
    </div>
</div><!-- Page-header end -->


<!-- Page body start -->
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
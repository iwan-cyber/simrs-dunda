<!DOCTYPE html>
<html lang="en">

<?= $this->include('alkes/header'); ?>

<body>

<div id="pcoded" class="pcoded">
        
    <div class="pcoded-container">

        <?= $this->include('alkes/navbar'); ?>
            
        <div class="pcoded-main-container">

            <?= $this->include('alkes/menu'); ?>

            <div class="pcoded-wrapper">
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body m-t-40">
                                    
                                    <?= $this->renderSection('content'); ?>

                                </div><!-- page-body -->
                            </div> <!-- page-wrapper -->
                        </div><!-- main-body -->
                    </div><!-- pcoded-inner-content -->
                </div><!-- pcoded-content -->
            </div><!-- pcoded-wrapper -->
        </div><!-- pcoded-main-container-->
    </div><!-- pcoded-container -->
</div><!-- pcoded -->

</body>

</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/css/bootstrap/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/css/font-awesome/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/css/common.css" />
    <link type="text/css" rel="stylesheet" href="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/css/list.css" />
    <link type="text/css" rel="stylesheet" href="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/css/general.css" />
    <link type="text/css" rel="stylesheet" href="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/css/plugins/animate.min.css" />
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/build/js/global-libs.min.js"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/js/jquery-plugins/bootstrap-growl.min.js"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/js/jquery-plugins/jquery.print-this.js"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/js/datagrid/gcrud.datagrid.js"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/js/datagrid/list.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>

<link type="text/css" rel="stylesheet" href="http://icecast.aleph-com.net/assets/grocery_crud/css/jquery_plugins/chosen/chosen.css" />
    <link type="text/css" rel="stylesheet" href="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/css/bootstrap/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/css/font-awesome/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/css/common.css" />
    <link type="text/css" rel="stylesheet" href="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/css/general.css" />
    <link type="text/css" rel="stylesheet" href="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/css/add-edit-form.css" />

    <script src="http://icecast.aleph-com.net/assets/grocery_crud/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/js/jquery_plugins/jquery.numeric.min.js" type="text/javascript"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/js/jquery_plugins/config/jquery.numeric.config.js" type="text/javascript"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/js/jquery_plugins/jquery.chosen.min.js" type="text/javascript"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/js/jquery_plugins/config/jquery.chosen.config.js" type="text/javascript"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/js/jquery-ui/jquery-ui.custom.min.js" type="text/javascript"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/js/jquery-plugins/jquery.form.min.js" type="text/javascript"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/js/common/common.min.js" type="text/javascript"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/themes/bootstrap/js/form/edit.js" type="text/javascript"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/js/jquery_plugins/jquery.noty.js" type="text/javascript"></script>
    <script src="http://icecast.aleph-com.net/assets/grocery_crud/js/jquery_plugins/config/jquery.noty.config.js" type="text/javascript"></script>

<?php if (isset($css_files)) { foreach($css_files as $file): ?>
<!--    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />  -->
<?php endforeach; } ?>

<?php if (isset($css_files)) { foreach($js_files as $file): ?>
<!--    <script src="<?php echo $file; ?>" type="text/javascript"></script>   -->
<?php endforeach; } ?>

</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <ul class="nav navbar-nav">
                <li><a href='<?php echo site_url('manage_conference');?>'>Home Page</a></li>
                <li><a href='<?php echo site_url('manage_conference/view');?>'>View</a></li>
                <li><a href='<?php echo site_url('manage_conference');?>'>Conferences</a></li>
                <li><a href='<?php echo site_url('manage_conference/recording');?>'>Recordings</a></li>  
                <li><a href='<?php echo site_url('manage_conference/salesperson');?>'>Salespeople</a></li>
                <li><a href='<?php echo site_url('manage_conference/vendor');?>'>Vendors</a></li>
            	<li><a href='<?php echo site_url('manage_conference/did');?>'>DIDs</a></li>
            	<li><a href='<?php echo site_url('manage_conference/mount');?>'>Mounts</a></li>
            	<li><a href='<?php echo site_url('manage_conference/cdr');?>'>CDRs</a></li>
                <li><a href='<?php echo site_url('manage_conference/cdr_billing');?>'>CDR Billing</a></li>
                <li><a href='<?php echo site_url('manage_conference/order');?>'>Order Bridge</a></li>
                <li><a href='<?php echo site_url('manage_conference/migrate');?>'>Update DB</a></li>
                </ul>
            </div>
        </div>
    </nav>
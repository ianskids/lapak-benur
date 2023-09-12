<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app-dark.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/style.css')?>" />


        <link rel="shortcut icon" href="<?= base_url('assets/static/images/logo/favicon.svg') ?>" type="image/x-icon" />
    <link rel="shortcut icon" href="<?= base_url('assets/static/images/logo/favicon.png') ?>" type="image/png" />
    <script src="<?= base_url('assets/extensions/jquery/jquery.min.js')?>"></script>

<link  rel="stylesheet" href="<?= base_url()?>assets/extensions/flatpickr/flatpickr.min.css"   />
<link  rel="stylesheet" href="<?= base_url()?>assets/extensions/toastify-js/src/toastify.css"   />
<link  rel="stylesheet" href="<?= base_url()?>assets/extensions/@fortawesome/fontawesome-free/css/all.min.css"   />

<!-- data tables -->
<link href="<?= base_url()?>assets/extensions/DataTables/DataTables-1.13.6/css/dataTables.bootstrap5.css" rel="stylesheet">
<link href="<?= base_url()?>assets/extensions/DataTables/Buttons-2.4.1/css/buttons.bootstrap5.css" rel="stylesheet">

</head>



<body>
     
    <script src="<?= base_url()?>assets/extensions/DataTables/JSZip-3.10.1/jszip.js"></script>
    <script src="<?= base_url()?>assets/extensions/DataTables/pdfmake-0.2.7/pdfmake.js"></script>
    <script src="<?= base_url()?>assets/extensions/DataTables/pdfmake-0.2.7/vfs_fonts.js"></script>
    <script src="<?= base_url()?>assets/extensions/DataTables/DataTables-1.13.6/js/jquery.dataTables.js"></script>
    <script src="<?= base_url()?>assets/extensions/DataTables/DataTables-1.13.6/js/dataTables.bootstrap5.js"></script>
    <script src="<?= base_url()?>assets/extensions/DataTables/Buttons-2.4.1/js/dataTables.buttons.js"></script>
    <script src="<?= base_url()?>assets/extensions/DataTables/Buttons-2.4.1/js/buttons.bootstrap5.js"></script>
    <script src="<?= base_url()?>assets/extensions/DataTables/Buttons-2.4.1/js/buttons.colVis.js"></script>
    <script src="<?= base_url()?>assets/extensions/DataTables/Buttons-2.4.1/js/buttons.html5.js"></script>
    <script src="<?= base_url()?>assets/extensions/DataTables/Buttons-2.4.1/js/buttons.print.js"></script>
    <!-- data tables -->
    <!-- select2 -->
    <link href="<?= base_url()?>assets/extensions/select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="<?= base_url()?>assets/extensions/select2/dist/js/select2.min.js"></script>
    <link href="<?= base_url()?>assets/extensions/select2/select2-bootstrap-5-theme-1.3.0/select2-bootstrap-5-theme.css" rel="stylesheet" />
    <!-- select2 -->
    <script src="<?= base_url()?>assets/extensions/flatpickr/flatpickr.min.js"></script>
    <script src="<?= base_url('assets/static/js/initTheme.js') ?>"></script>
    <?php include (dirname(__FILE__) . '../../include/script.php'); ?>
    <div id="app">
        <?php $this->load->view('template/include/sidebar') ?>
        <div id="main">
            <?php $this->load->view('template/include/header') ?>
            <?php echo @$content; ?>
            <?php $this->load->view('template/include/footer'); ?>
        </div>
    </div>

    <script src="<?= base_url()?>assets/static/js/components/dark.js"></script>
     <script src="<?= base_url()?>assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

     <script src="<?= base_url()?>assets/compiled/js/app.js"></script>
     <script src="<?= base_url()?>assets/extensions/toastify-js/src/toastify.js"></script>
     
</body>

</html>


    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="<?php echo $cb->assets_folder; ?>/css/codebase.min.css">
    <?php if ($cb->theme) { ?>
    <link rel="stylesheet" id="css-theme" href="<?php echo $cb->assets_folder; ?>/css/themes/<?php echo $cb->theme; ?>.min.css">
    <?php } ?>
    <!-- END Stylesheets -->
    <?php $cb->get_css('js/plugins/sweetalert2/sweetalert2.min.css'); ?>
    <?php $cb->get_css('js/plugins/select2/css/select2.css'); ?>
    <?php $cb->get_css('js/plugins/datatables/dataTables.bootstrap4.css'); ?>
</head>
<body>

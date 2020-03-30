<?php
    $success = $this->session->flashdata('success');
    $error   = $this->session->flashdata('error');
    $warning = $this->session->flashdata('warning');

    if ($error) {
        $message_status = 'alert alert-danger alert-dismissible fade in';
        $message = $error;
    }

    if ($warning) {
        $message_status = 'alert alert-warning alert-dismissible fade in';
        $message = $warning;
    }

    if ($success) {
        $message_status = 'alert alert-success alert-dismissible fade in';
        $message = $success;
    }
?>

<?php if ($success || $warning || $error): ?>
    <div class="row">
        <div class="col-10">
            <div class="message-box <?= $message_status ?>">
                <?= $message ?>
            </div>
        </div>
    </div>
<?php endif ?>
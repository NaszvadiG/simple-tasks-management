<!DOCTYPE html>
<html>
<head>
    <title>Simple Tasks Management</title>
    <link rel="icon" href="<?php echo assets_url('images/favicon.JPG'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/me/css/style.css') ?>">
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
</head>
<body>
    <div id="my-app" class="container">
        <div class="row">
            <div id="title" class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                <h1 class="page-header text-center text-uppercase">
                    <b>Simple Tasks Management</b>
                </h1>
            </div>
            <div class="clearfix"></div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php if(validation_errors() != FALSE): ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Warning!</strong>
                        <ul>
                            <?php echo validation_errors('<li>','</li>'); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if(!empty($_SESSION['alert-success'])): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Success!</strong> <?php echo $_SESSION['alert-success']; ?>
                    </div>
                <?php endif; ?>

                <?php if(!empty($_SESSION['alert-error'])): ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Error!</strong> <?php echo $_SESSION['alert-error']; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a class="btn btn-xs btn-primary" href="#add-form" role="button" data-toggle="collapse">Tambah</a>
                <div id="add-form" class="collapse">
                <?php echo form_open(site_url('task/add'),['method' => 'post']); ?>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th><label for="task_name">Tasks name</label></th>
                                <th>Start</th>
                                <th>Deadline</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input name="task_name" type="text" class="input-sm form-control">
                                </td>
                                <td>
                                    <div class="input-group date datetimepicker">
                                        <input name="task_start" type="text" class="input-sm form-control" readonly>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </td>

                                <td>
                                    <div class="input-group date datetimepicker">
                                        <input name="task_end" type="text" class="input-sm form-control" readonly>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </td>

                                <td class="text-center">
                                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                                    <button type="reset" class="btn btn-sm btn-default">Reset</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="table-responxive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tasks name</th>
                                <th>Start</th>
                                <th>Deadline</th>
                                <th>Finished</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($tasks === NULL): ?>
                                <td colspan="7">No data!</td>
                            <?php else: ?>
                                <?php $no = 1;?>
                                <?php foreach ($tasks as $task):?>
                                <?php echo form_open(site_url('task/edit/'.$task['task_id']),['method' => 'post']); ?>
                                    <tr>
                                        <td class="text-center">
                                            <span><?= $no; ?></span>
                                        </td>
                                        <td class="task-name col-xs-5">
                                            <span><?= $task['task_name'] ?></span>
                                            <input name="task_name" type="text" class="form-control input-sm hidden"
                                            value="<?= $task['task_name'] ?>">
                                        </td>
                                        <td class="task-start">
                                            <span><?= date('d-m-Y H:i',strtotime($task['task_start'])) ?></span>

                                            <div class="input-group date datetimepicker hidden">
                                                <input name="task_start" type="text" class="form-control input-sm"
                                                value="<?= date('d-m-Y H:i',strtotime($task['task_start'])) ?>" readonly>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </td>
                                        <td  class="task-end">
                                            <span><?= date('d-m-Y H:i',strtotime($task['task_end']))?></span>

                                            <div class="input-group date datetimepicker hidden">
                                                <input name="task_end" type="text" class="form-control input-sm"
                                                value="<?= date('d-m-Y H:i',strtotime($task['task_end']))?>" readonly>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="is-finish <?php echo ($task['is_finish'] == 'Y') ? 'success' : 'warning'; ?>">

                                            <?php if($task['is_finish'] == 'Y'): ?>
                                                <span><?= "Finished"; ?></span>
                                            <?php else: ?>
                                                <span><?= "Not yet"; ?></span>
                                            <?php endif; ?>

                                            <select name="is_finish" id="" class="form-control input-sm hidden">
                                                <option value="Y">Finished</option>
                                                <option value="N">Not yet</option>
                                            </select>
                                        </td>
                                        <td class="text-center col-xs-2">
                                            <div class="btn-group btn-group-edit">

                                                <?php if($task['is_finish'] == 'N'): ?>
                                                    <a class="btn btn-xs btn-primary" href="<?php echo site_url('task/finish/'.$task['task_id']); ?>" role="button">Finished</a>
                                                <?php else: ?>
                                                    <a class="btn btn-xs btn-default" href="<?php echo site_url('task/unfinish/'.$task['task_id']); ?>" role="button">Unfinish</a>
                                                <?php endif; ?>
                                                <br class="hidden-lg hidden-md">
                                                <button type="button" class="btn-edit btn btn-xs btn-warning" role="button">Edit</button>
                                                <br class="hidden-lg hidden-md">
                                                <button task-id="<?php echo $task['task_id']; ?>" type="button" class="btn-delete btn btn-xs btn-danger" data-toggle="confirmation" role="button">Delete</button>
                                            </div>

                                            <div class="btn-group btn-group-edit hidden">
                                                <button type="submit" class="btn btn-xs btn-warning" role="button">Save</button>
                                                <br class="hidden-lg hidden-md">
                                                <button type="button" class="btn-edit btn btn-xs btn-default" role="button">Cancel</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                                <?php $no++; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/moment-develop/min/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-confirmation.js') ?>"></script>
<script src="<?= base_url('assets/me/js/script.js') ?>"></script>

<!-- Datetime picker -->
<script src="<?= base_url('assets/plugins/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js') ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.css') ?>">

<script>
    $(document).ready(function(){

        inline_edit(); // script.js

        $('button[data-toggle="confirmation"].btn-delete').confirmation({
            placement: 'left',
            btnCancelClass: 'btn btn-xs btn-default',
            btnOkClass: 'btn btn-xs btn-danger',
            onConfirm: function(ev,el){
                var task_id = el.attr('task-id');
                var url = "<?php echo site_url('task/delete/"+task_id+"'); ?>";

                window.location.href = url;
            }
        });

        $('.datetimepicker').datetimepicker({
            sideBySide: true,
            ignoreReadonly: true,
            format: 'DD-MM-YYYY H:mm',
        });
    });
</script>
</html>

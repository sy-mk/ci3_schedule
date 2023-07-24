<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?php echo base_url(); ?>" class="h1"><b>My</b> Scheduler</a>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('message'); ?>
            <p class="login-box-msg">Sign in to start your session</p>

            <?= form_open('auth') ?>
            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control" name="email" value="<?= set_value('email'); ?>" placeholder="Username" required autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <?php echo form_error('email'); ?>
            <div class="input-group">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <?php echo form_error('password'); ?>
            <div class="row mt-3">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
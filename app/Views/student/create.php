<?= $this->extend('layout/master'); ?>

<?= $this->section('content'); ?>
        <a href="<?= base_url('/student/add')?>" class="btn btn-lg btn-primary">Tambah</a>
      </div>
        <div class="col-md-12">
          <div class="card border-left-primary shadow h-100 py-2">
          <div class="h4">Add Data</div>
            <div class="card-body">
            <?php
              $inputs = session()->getFlashdata('inputs');
              $errors = session()->getFlashdata('errors');
              if(!empty($errors)){ ?>
                  <div class="alert alert-danger">
                  Ada Kesalahan saat input data, yaitu:
                    <ul>
                      <?php foreach($errors as $errors): ?>
                        <li><?=esc($errors) ?></li>
                        <?php endforeach ?>
                    </ul>
                  </div>
              <?php } ?>
                <form action="<?= base_url('student/save') ?> " method="post">
                    <div class="form-group">
                        <label for="">Student Name</label>
                        <input type="text" class="form-control" name ="name" value="<?= $inputs['name']; ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Date of Birth</label>
                        <input type="date" class="form-control" name ="tgl_lahir" value="<?= $inputs['tgl_lahir']; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="">Place of Birth</label>
                        <input type="text" class="form-control" name ="tmpt_lahir" value="<?= $inputs['tmpt_lahir']; ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <input type="text" class="form-control" name ="gender" value="<?= $inputs['gender']; ?>" autofocus>
                    </div>
                    <div class="form-group mt-3"  >
                        <input type="reset" class="btn btn-warning">
                        <input type="submit" class="btn btn-primary btn-md" value="save" name ="save">
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?= $this->endSection('content')?>
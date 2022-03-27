<?= $this->extend('layout/master'); ?>

<?= $this->section('content'); ?>
  <a href="<?= base_url('/transaksi')?>" class="btn btn-lg btn-primary">Kembali</a>
  </div>
      <div class="row">
      <div class="h5">Tambah Pakaian </div>
        <div class="col-md-12">
          <div class="card border-left-primary shadow h-100 py-2">
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
                <form action="<?= base_url('transaksi/save') ?> " method="post">
                    <div class="form-group">
                        <label for="">Nama Pakaian</label>
                        <input type="text" class="form-control" name ="nama" value="<?= $inputs['nama']; ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="number" class="form-control" name ="harga" value="<?= $inputs['harga']; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="number" class="form-control" name ="stok" value="<?= $inputs['stok']; ?>" >
                    </div>
                    <div class="form-group mt-3"  >
                        <input type="reset" class="btn btn-warning">
                        <input type="submit" class="btn btn-primary btn-md" value="Simpan" name ="save">
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?= $this->endSection('content')?>



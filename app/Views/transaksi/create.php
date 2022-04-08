<?= $this->extend('layout/master'); ?>

<?= $this->section('content'); ?>
  <a href="<?= base_url('/transaksi')?>" class="btn btn-lg btn-primary">Kembali</a>
  </div>
      <div class="row">
      <div class="h5">Tambah Transaksi</div>
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
                        <label for="">Id Pembeli</label>
                        <input type="text" class="form-control" name ="id_pembeli" value="<?= $inputs['id_pembeli']; ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Id Barang</label>
                        <input type="text" class="form-control" name ="id_barang" value="<?= $inputs['id_barang']; ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="number" class="form-control" name ="jumlah" value="<?= $inputs['jumlah']; ?>" >
                    </div>
                    <div class="form-group">
                        <label for=""> Total Harga</label>
                        <input type="number" class="form-control" name ="total_harga" value="<?= $inputs['total_harga']; ?>" >
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



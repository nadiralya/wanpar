<?= $this->extend('layout/master'); ?>

<?= $this->section('content'); ?>
        <a href="<?= base_url('/transaksi/tambah')?>" class="btn btn-lg btn-primary">Tambah</a>
      </div>
        <div class="col-md-12">
          <div class="card border-left-primary shadow h-100 py-2">
          <div class="h4">Kelola Pakaian</div>
            <div class="card-body">
              <?php
              $success = session()->getFlashdata('success');
              if(!empty($success)){ ?>
                  <div class="alert alert-success">
                    <?= esc($success) ?>
                  </div>
              <?php } ?>
              <table class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Pembeli</th>
                    <th>Id Barang</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($transaksi as $no => $row){?>
                  <tr>
                    <td><?= $no+1 ?> </td>
                    <td><?= $row['jumlah'] ?> </td>
                    <td><?= $row['total_harga'] ?> </td>
                    <td>
                      <a href="<?= base_url('/transaksi/edit/' . $row['id']) ?>" class="btn btn-warning"> Edit </a>
                      <a href="<?= base_url('/transaksi/hapus/' . $row['id']) ?>" class="btn btn-danger" onclick="return confirm('yakin akan dihapus')"> Hapus </a>
                    </td>
                  </tr>
                  <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  
<?= $this->endSection('content');?>
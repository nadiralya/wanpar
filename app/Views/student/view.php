<?= $this->extend('layout/master'); ?>
 
<?= $this->section('content'); ?>
        <a href="<?= base_url('/student/add')?>" class="btn btn-lg btn-primary">Tambah</a>
      </div>
        <div class="col-md-12">
          <div class="card border-left-primary shadow h-100 py-2">
          <div class="h4">Student Data</div>
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
                    <th>Id</th>
                    <th>Student Name</th>
                    <th>Date of Birth</th>
                    <th>Place of Birth</th>
                    <th>Gender</th>
					<th>Pilihan</th>
				</tr>
                </thead>
                <tbody>
                  <?php foreach ($student as $no => $row){?>
                  <tr>
                    <td><?= $no+1 ?> </td>
                    <td><?= $row['name'] ?> </td>
                    <td><?= $row['tgl_lahir'] ?> </td>
                    <td><?= $row['tmpt_lahir'] ?> </td>
                    <td><?= $row['gender'] ?> </td>
                    <td>
                      <a href="<?= base_url('/student/edit/' . $row['id']) ?>" class="btn btn-warning"> Edit </a>
                      <a href="<?= base_url('/student/delete/' . $row['id']) ?>" class="btn btn-danger" onclick="return confirm('yakin akan dihapus')"> Hapus </a>
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
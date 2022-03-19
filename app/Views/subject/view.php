<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapel View</title>
    <link rel="shortcut icon" href="img/webpro.jpeg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="h1">Kelola Mapel by Nadira Alya</div>
        <a href="<?= base_url('/subject/add')?>" class="btn btn-lg btn-primary">Add</a>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card border-left-primary shadow h-100 py-2">
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
                    <th>Subjects</th>
                    <th>Subjects Hours</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($subject as $no => $row){?>
                  <tr>
                    <td><?= $no+1 ?> </td>
                    <td><?= $row['subjects'] ?> </td>
                    <td><?= $row['subject_hours'] ?> </td>
                    <td>
                      <a href="<?= base_url('/subject/edit/' . $row['id']) ?>" class="btn btn-warning"> Edit </a>
                      <a href="<?= base_url('/subject/delete/' . $row['id']) ?>" class="btn btn-danger" onclick="return confirm('yakin akan dihapus')"> Hapus </a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>

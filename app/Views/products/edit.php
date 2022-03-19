<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurusan Create</title>
    <link rel="shortcut icon" href="webpro.jpeg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <div class="h1">Edit Kelas by Nadira Alya</div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                  <?php
                      $inputs = session()->getFlashdata('inputs');
                      $errors = session()->getFlashdata('errors');
                      if(!empty($errors)){ ?>
                          <div class='alert alert-danger'>
                              Ada Kesalahan Pada Saat Input Data, yaitu :
                              <ul>
                                  <?php foreach($errors as $error) : ?>
                                      <li><?= esc($error) ?></li>
                                  <?php endforeach ?>
                             </ul>
                          </div>
                      <?php } ?>
                      <form action="<?= base_url("jurusan/update")?>" method="post">     
                                <div class="form-grup">
                                    <input type="hidden" name="id" value="<?= $jurusan['id']?>">
                                    <label for="">Nama Kelas</label>
                                    <input type="text" class="form-control" name="grade" value="<?= $inputs['grade']==''?$jurusan ['grade']:$inputs['grade']?>"  autofocus>
                                </div>
                                <div class="form-grup">
                                    <label for="">Kapasitas</label>
                                    <input type="text" class="form-control" name="capacity" value="<?= $inputs['capacity']==''?$jurusan ['capacity']:$inputs['capacity']?>" >
                                </div>
                                <div class="form-grup">
                                    <label for="">Terisi</label>
                                    <input type="text" class="form-control" name="amount" value="<?= $inputs['amount']==''?$jurusan ['amount']:$inputs['amount']?>" >
                                </div>
                                <div class="form-grup mt-3 mb-5">
                                    <input type="reset" class="btn btn-warning">
                                    <input type="submit" value="Update" name="update" class="btn btn-success">
                                </div>
                            </form>
                  </div>
              </div>
          </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
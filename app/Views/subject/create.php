<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas View</title>
    <link rel="shortcut icon" href="img/logoo.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="h1">Add Subject by Nadira Alya</div>
        <a href="<?= base_url('/subject')?>" class="btn btn-lg btn-primary">back</a>
      </div>
      <div class="row">
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
                <form action="<?= base_url('subject/save') ?> " method="post">
                    <div class="form-group">
                        <label for="">Subject Name</label>
                        <input type="text" class="form-control" name ="subjects" value="<?= $inputs['subjects']; ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Subject Hours</label>
                        <input type="number" class="form-control" name ="subject_hours" value="<?= $inputs['subject_hours']; ?>" >
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
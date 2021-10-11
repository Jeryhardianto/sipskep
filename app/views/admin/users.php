  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="page-breadcrumb">
      <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Form Tambah User</h4>
              <div class="ml-auto text-right">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">
                              Tambah User
                          </li>
                      </ol>
                  </nav>
              </div>
          </div>
      </div>
  </div>
  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="container-fluid">
      <!-- ============================================================== -->
      <!-- Konten -->
      <!-- ============================================================== -->
      <div class="row">
          <div class="col-md-12">
              <div class="card custom-border-top box-card">
                  <form class="form-horizontal" action="<?= BASEURL ?>testimoni/tambah" method="post"
                      enctype="multipart/form-data">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="card-body">
                                  <h4 class="card-title">Tanbah User</h4>
                                  <div class="form-group row">
                                      <label for="fname"
                                          class="col-sm-2 text-end control-label col-form-label">Nama</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="nama" name="nama"
                                              placeholder="Ketik Disini" />
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="fname"
                                          class="col-sm-2 text-end control-label col-form-label">Email</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="email" name="email"
                                              placeholder="Ketik Disini" />
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-sm-2 text-end control-label col-form-label">Role</label>
                                      <div class="col-sm-10">
                                          <select class="select2 form-select shadow-none"
                                              style="width: 100%; height: 36px">
                                              <option> -- Pilih Role --</option>
                                              <option value="AK">Alaska</option>
                                              <option value="HI">Hawaii</option>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="fname"
                                          class="col-sm-2 text-end control-label col-form-label">Passowrd</label>
                                      <div class="col-sm-10">
                                          <input type="password" class="form-control" id="pass1" name="pass1"
                                              placeholder="Ketik Disini" />
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="fname" class="col-sm-2 text-end control-label col-form-label">Confrim
                                          Passowrd</label>
                                      <div class="col-sm-10">
                                          <input type="password" class="form-control" id="pass2" name="pass2"
                                              placeholder="Ketik Disini" />
                                      </div>
                                  </div>

                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="card-body">
                                  <label class="col-sm-12 col-form-label">Foto</label>
                                  <div class="col-sm-12">
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <input type="file" id="gambarTestimoni" name="gambarTestimoni"
                                                  onchange="previewImageTestimoni();" required />
                                          </div>
                                          <div class="col-sm-6">
                                              <img id="gambarTestimoniPrev"
                                                  src="https://via.placeholder.com/200C/O https://placeholder.com/"
                                                  alt="image preview" width="250" />
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="border-top">
                          <div class="card-body">
                              <button type="submit" class="btn btn-success float-right  mb-4 mr-2">Submit</button>

                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <form action="">
                  <div class="card custom-border-top box-card">
                      <div class="card-body">
                          <h4 class="card-title">Users</h4>
                          <div class="control-group">
                              <div class="controls mb-3">
                                  <div class="main_input_box">
                                      <?php Flasher::flash();  ?>
                                  </div>
                              </div>
                          </div>
                          <table class="table" id="exa5">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>Email</th>
                                      <th>Level</th>
                                      <th>Tanggal Buat</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <?php 
                                if (count($data['users'])) {
                                    $count = 1;
                                    foreach ($data['users'] as $users) {
                                    $level =  $users['level'];
                                    if ($level == '1') {
                                        $level = 'Admin';
                                    }elseif ($level == '2') {
                                        $level = 'Staf Kelurahan';      
                                    }elseif ($level == '3') {
                                        $level = 'Staf Kecamatan';
                                    }elseif ($level == '4'){
                                        $level = 'Camat';
                                    }elseif ($level == '5') {
                                        $level = 'Warga';
                                       
                                    }
                                
                                   
                              ?>
                              <tbody>
                                  <td><?= $count++; ?></td>
                                  <td><?= $users['nama'] ?></td>
                                  <td><?= $users['email'] ?></td>
                                  <td width="15%"><?= $level ?></td>
                                  <td width="15%"><?= $users['date_created'] ?></td>
                                  <td>
                                      <a href="<?= BASEURL ?>testimoni/edit/<?= $users['id_pengguna'] ?>"><i
                                              class="mdi mdi-pencil"></i>
                                          Edit</a> ||
                                      <a onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')"
                                          href="<?= BASEURL ?>testimoni/hapus/<?= $users['id_pengguna'] ?>"><i
                                              class="mdi mdi-delete"></i>Hapus</a>
                                  </td>
                              </tbody>
                              <?php
                                    }
                                }else {
                                    echo "
                                         <tbody>
                                           <td colspan='6' style='text-align:center'>Data tidak ada</td>
                                         </tbody>
                                    ";
                                }
                              ?>
                          </table>
                      </div>
                      <!-- <div class="card-footer">
                          <button type="submit" class="btn btn-success float-right">Submit</button>
                      </div> -->
                  </div>
              </form>
          </div>
      </div>
  </div>
<!-- Footer -->
<footer class="sticky-footer bg-white none-print">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; PT. Rajawali Nusantara Indonesia <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModal">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout/') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Proses Modal -->
<div class="modal fade" id="proses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="proses">Ubah Proses</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('admin/tambahProses') ?>" method="post">
        <div class="modal-body">
            <input type="text" hidden id="id" name="id" value="">
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                <option selected disabled>Belum diproses</option>    
                <option value="Sedang diproses">Sedang diproses</option>
                <option value="Selesai">Selesai</option>
                </select>
            </div>
            <?= form_error('status', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Status Mobil Modal -->
<div class="modal fade" id="statusMobil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="statusMobil">Ubah Status Mobil</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
      </div>
      <form>
      <div class="modal-body">
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                <option selected disabled value="Belum dikembalikan">Belum dikembalikan</option>    
                <option value="Sudah dikembalikan">Sudah dikembalikan</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

<!-- Swal -->
<script src="<?= base_url('assets/swal-js/'); ?>sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/js/'); ?>myscript.js"></script>

<script>
    $(document).ready(function(){
        <?php if($this->session->flashdata('berhasil')){ ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '<?= $this->session->flashdata('berhasil') ?>'
            });
        <?php
        }
        ?>
    })

    
</script>

</body>

</html>
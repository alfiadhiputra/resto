</div>
<!-- /container -->

    <!-- menambahkan jquery sebagai js lib yang dibutuhkan bootstrap -->
    <script src="<?php echo $alamat_web; ?>libs/js/jquery.js"></script>
    <!-- menambahkan bootstrapjs sebagai js lib yang dibutuhkan bootstrap -->
    <script src="<?php echo $alamat_web; ?>libs/js/bootstrap.js"></script>
    <!-- menambahkan bootbox sebagai js lib yang dibutuhkan bootstrap -->
    <script src="<?php echo $alamat_web; ?>libs/js/bootbox.js"></script>

<script>
// kode JavaScript untuk menghapus data
$(document).on('click', '.delete-object', function(){
    var id = $(this).attr('delete-id');

    bootbox.confirm({
        message: "<h4>Apa kamu yakin ingin menghapus?</h4>",
        buttons: {
            confirm: {
                label: '<span class="glyphicon glyphicon-ok"></span> Iya',
                className: 'btn-danger'
            },
            cancel: {
                label: '<span class="glyphicon glyphicon-remove"></span> Tidak',
                className: 'btn-primary'
            }
        },
        callback: function (result) {

            if(result==true){
                $.post('hapus_produk.php', {
                    object_id: id
                }, function(data){
                    location.reload();
                }).fail(function() {
                    alert('Gagal menghapus data.');
                });
            }
        }
    });

    return false;
});
</script>
</body>
</html>
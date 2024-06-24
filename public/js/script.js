$(function() {

    $('.tombolTambahData').on('click', function() {

        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        $('#nama').val('');
        $('#no_telp').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');
    });
    
    $('.tampilModalUbah').on('click' , function() {

        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/learn_phpmvc/public/mahasiswa/ubah');
        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/learn_phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post', 
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#no_telp').val(data.no_telp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        })
    });


}); 
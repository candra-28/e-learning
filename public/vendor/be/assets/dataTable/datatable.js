$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('#classes').dataTable({
        processing: true,
        serverSide: true,
        ajax: "class",
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "semua"]],
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'class_name',
                name: 'cls_major_id',
                orderable: true,
                searchable: true
            },
            {
                data: 'scy_name',
                name: 'school_years.scy_name',
                orderable: true,
                searchable: true
            },
            {
                data: 'cls_is_active',
                name: 'cls_is_active',
                orderable: false,
                searchable: false
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
        "language": {
            // "processing": "Mohon tunggu",
            "processing": '<h4 style="font-family: arial;">Mohon Tunggu</h4>',
            "search": "Cari:",
            // "processing": "Mohon tunggu",
            "zeroRecords": "Daftar Siswa tidak tersedia",
            "info": "Halaman _PAGE_ dari _PAGES_ Lainya",
            "infoEmpty": "Tidak ada daftar Siswa",
            "infoFiltered": "(pencarian dari _MAX_ daftar Siswa)",
            "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "lengthMenu": "Tampilkan _MENU_ baris",
            "paginate": {
                "previous": "sebelumnya",
                "next": "selanjutnya"
            }
        }
    });

      $('body').on('click', '.status_class', function () {

        var cls_id = $(this).data("id");
        let _token = $('meta[name="csrf-token"]').attr('content');

        swal({
          title: "Status Kelas",
          text: 'Apakah anda yakin ingin mengubah status kelas?',
          icon: "warning",
          buttons: true,
          dangerMode: true,
          closeOnClickOutside: false,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              type: 'POST',
              url: 'class/edit-status/' + cls_id,
              data: {
                cls_id: cls_id,
                _token: _token 
              },
              success: function(data) {
                console.log(data)
                if (data.status != false) {
                  swal(data.message, {
                    button: false,
                    icon: "success",
                    timer: 1000
                  });
                } else {
                  swal(data.message, {
                    button: false,
                    icon: "error",
                    timer: 1000
                  });
                }
                $('#classes').DataTable().ajax.reload()
              },
              error: function(error) {
                swal('Terjadi kegagalan sistem', {
                  button: false,
                  icon: "error",
                  timer: 1000
                });
              }
            });
          }
        });
    });
});
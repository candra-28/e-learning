$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('#classes').dataTable({
        processing: true,
        serverSide: true,
        ajax: "classes",
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
            // "processing": '<h4 style="font-family: arial;">Mohon Tunggu</h4>',
            "processing": '<img src="../../../vendor/be/assets/images/3.svg" style="width="20px; height="20px;">',
            "search": "Cari:",
            "zeroRecords": "Daftar kelas tidak tersedia",
            "info": "Halaman _PAGE_ dari _PAGES_ Lainya",
            "infoEmpty": "Tidak ada daftar kelas",
            "infoFiltered": "(pencarian dari _MAX_ daftar kelas)",
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

$(document).ready(function() {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  var table = $('#majors').dataTable({
      processing: true,
      serverSide: true,
      ajax: "majors",
      lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "semua"]],
      columns: [{
              data: 'DT_RowIndex',
              name: 'DT_RowIndex',
              orderable: false,
              searchable: false
          },
          {
              data: 'mjr_name',
              name: 'mjr_name',
              orderable: true,
              searchable: true
          },
          {
              data: 'mjr_is_active',
              name: 'mjr_is_active',
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
          // "processing": '<h4 style="font-family: arial;">Mohon Tunggu</h4>',
          "processing": '<img src="../../../vendor/be/assets/images/3.svg" style="width="20px; height="20px;">',
          "search": "Cari:",
          "zeroRecords": "Daftar kelas tidak tersedia",
          "info": "Halaman _PAGE_ dari _PAGES_ Lainya",
          "infoEmpty": "Tidak ada daftar kelas",
          "infoFiltered": "(pencarian dari _MAX_ daftar kelas)",
          "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
          "lengthMenu": "Tampilkan _MENU_ baris",
          "paginate": {
              "previous": "sebelumnya",
              "next": "selanjutnya"
          }
      }
  });

  $('body').on('click', '.status_major', function () {

    var mjr_id = $(this).data("id");
    let _token = $('meta[name="csrf-token"]').attr('content');

    swal({
      title: "Status Jurusan",
      text: 'Apakah anda yakin ingin mengubah status jurusan?',
      icon: "warning",
      buttons: true,
      dangerMode: true,
      closeOnClickOutside: false,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type: 'POST',
          url: 'major/edit-status/' + mjr_id,
          data: {
            mjr_id: mjr_id,
            _token: _token 
          },
          success: function(data) {
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
            $('#majors').DataTable().ajax.reload()
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


$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('#students').dataTable({
        processing: true,
        serverSide: true,
        ajax: "students",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
              data: 'usr_profile_picture', 
              name:'usr_profile_picture', 
              render: function(data, type, full, meta){
                  return "<img src=\"" + data + "\"height=\"50\"/>";
              },
              orderable: true,
              searchable: true
            },
            {
                data: 'stu_nis',
                name: 'stu_nis',
                orderable: true,
                searchable: true
            },
            {
                data: 'usr_name',
                name: 'usr_name',
                orderable: true,
                searchable: true
            },
            {
                data: 'stu_is_active',
                name: 'stu_is_active',
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
          // "processing": '<h4 style="font-family: arial;">Mohon Tunggu</h4>',
          "processing": '<img src="../../../vendor/be/assets/images/3.svg" style="width="20px; height="20px;">',
          "search": "Cari:",
          "zeroRecords": "Daftar siswa tidak tersedia",
          "info": "Halaman _PAGE_ dari _PAGES_ Lainya",
          "infoEmpty": "Tidak ada daftar siswa",
          "infoFiltered": "(pencarian dari _MAX_ daftar siswa)",
          "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
          "lengthMenu": "Tampilkan _MENU_ baris",
          "paginate": {
              "previous": "sebelumnya",
              "next": "selanjutnya"
          }
      }
    });

    
  $('body').on('click', '.status_student', function () {

    var stu_id = $(this).data("id");
    console.log(stu_id)
    let _token = $('meta[name="csrf-token"]').attr('content');

    swal({
      title: "Status Siswa",
      text: 'Apakah anda yakin ingin mengubah status siswa?',
      icon: "warning",
      buttons: true,
      dangerMode: true,
      closeOnClickOutside: false,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type: 'POST',
          url: 'student/edit-status/' + stu_id,
          data: {
            stu_id: stu_id,
            _token: _token 
          },
          success: function(data) {
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
            $('#students').DataTable().ajax.reload()
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


function classes(){
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
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "semua"]
            ],
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'class_name',
                name: 'cls_major_id',
                orderable: true,
                searchable: true
            }, {
                data: 'scy_name',
                name: 'school_years.scy_name',
                orderable: true,
                searchable: true
            }, {
                data: 'usr_name',
                name: 'users.usr_name',
                orderable: false,
                searchable: false
            },{
                data: 'cls_is_active',
                name: 'cls_is_active',
                orderable: false,
                searchable: false
            }, {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }, ],
            "language": {
                "processing": '<img src="../../../vendor/be/assets/images/3.svg" style="width="20px; height="20px;">',
                "search": "Cari:",
                "zeroRecords": "Daftar kelas tidak tersedia",
                "info": "Halaman _PAGE_ dari _PAGES_ Lainya",
                "infoEmpty": "Tidak ada daftar kelas",
                "infoFiltered": "(pencarian dari _MAX_ daftar kelas)",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 baris",
                "lengthMenu": "Tampilkan _MENU_ baris",
                "paginate": {
                    "previous": "sebelumnya",
                    "next": "selanjutnya"
                }
            }
        });
        $('body').on('click', '.status_class', function() {
            var cls_id = $(this).data("id");
            let _token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: "Status Kelas",
                text: 'Apakah anda yakin ingin mengubah status kelas?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
            }).then((willDelete) => {
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
}

function majors(){
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
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "semua"]
            ],
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'mjr_name',
                name: 'mjr_name',
                orderable: true,
                searchable: true
            }, {
                data: 'mjr_is_active',
                name: 'mjr_is_active',
                orderable: false,
                searchable: false
            }, {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }, ],
            "language": {
                "processing": '<img src="../../../vendor/be/assets/images/3.svg" style="width="20px; height="20px;">',
                "search": "Cari:",
                "zeroRecords": "Daftar kelas tidak tersedia",
                "info": "Halaman _PAGE_ dari _PAGES_ Lainya",
                "infoEmpty": "Tidak ada daftar kelas",
                "infoFiltered": "(pencarian dari _MAX_ daftar kelas)",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 baris",
                "lengthMenu": "Tampilkan _MENU_ baris",
                "paginate": {
                    "previous": "sebelumnya",
                    "next": "selanjutnya"
                }
            }
        });
        $('body').on('click', '.status_major', function() {
            var mjr_id = $(this).data("id");
            let _token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: "Status Jurusan",
                text: 'Apakah anda yakin ingin mengubah status jurusan?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
            }).then((willDelete) => {
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
}

function students(){
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
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "semua"]
            ],
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'usr_profile_picture',
                name: 'usr_profile_picture',
                render: function(data, type, full, meta) {
                    if(data != null){
                        return "<img src=\"" + data + "\"height=\"50\"/>";
                    }else{
                        return "<img src=\"vendor" + "/" + "be" + "/" + "assets" + "/" + "images" + "/" + "profile_picture"+ "/" + "avatar-2.png" + "\"height=\"50\"/>";
                    }
                },
                orderable: true,
                searchable: true
            }, {
                data: 'stu_nis',
                name: 'stu_nis',
                orderable: true,
                searchable: true
            }, {
                data: 'usr_name',
                name: 'usr_name',
                orderable: true,
                searchable: true
            }, {
                data: 'stu_is_active',
                name: 'stu_is_active',
                orderable: false,
                searchable: false
            }, {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }, ],
            "language": {
                "processing": '<img src="../../../vendor/be/assets/images/3.svg" style="width="20px; height="20px;">',
                "search": "Cari:",
                "zeroRecords": "Daftar siswa tidak tersedia",
                "info": "Halaman _PAGE_ dari _PAGES_ Lainya",
                "infoEmpty": "Tidak ada daftar siswa",
                "infoFiltered": "(pencarian dari _MAX_ daftar siswa)",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 baris",
                "lengthMenu": "Tampilkan _MENU_ baris",
                "paginate": {
                    "previous": "sebelumnya",
                    "next": "selanjutnya"
                }
            }
        });
        $('body').on('click', '.status_student', function() {
            var stu_id = $(this).data("id");
            let _token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: "Status Siswa",
                text: 'Apakah anda yakin ingin mengubah status siswa?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
            }).then((willDelete) => {
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
}

function user_log_histories(){
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#user_log_histories').dataTable({
            processing: true,
            serverSide: true,
            ajax: "log-histories",
            columnDefs: [{
                targets: 4,
                className: 'd-flex text-wrap',
            }],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "semua"]
            ],
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'usr_name',
                name: 'users.usr_name',
                orderable: true,
                searchable: true
            }, {
                data: 'ulh_log_ip',
                name: 'ulh_log_ip',
                orderable: true,
                searchable: true
            },{
                data: 'ulh_date',
                name: 'ulh_date',
                orderable: true,
                searchable: true
            }, {
                data: 'ulh_user_agent',
                name: 'ulh_user_agent',
                orderable: false,
                searchable: false
            }, ],
            "language": {
                "processing": '<img src="../../../vendor/be/assets/images/3.svg" style="width="20px; height="20px;">',
                "search": "Cari:",
                "zeroRecords": "Daftar pengguna login tidak tersedia",
                "info": "Halaman _PAGE_ dari _PAGES_ Lainya",
                "infoEmpty": "Tidak ada daftar pengguna login",
                "infoFiltered": "(pencarian dari _MAX_ daftar pengguna login)",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 baris",
                "lengthMenu": "Tampilkan _MENU_ baris",
                "paginate": {
                    "previous": "sebelumnya",
                    "next": "selanjutnya"
                }
            }
        });
        $('body').on('click', '.reset_log_histories', function() {
            let _token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: "History Login Pengguna",
                text: 'Apakah anda yakin ingin mengubah status siswa?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'POST',
                        url: 'log-histories',
                        data: {
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
                            $('#user_log_histories').DataTable().ajax.reload()
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
}

function log_login(){
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#login_log').dataTable({
            processing: true,
            serverSide: true,
            ajax: "log-login",
            columnDefs: [{
                targets: 3,
                className: 'd-flex text-wrap',
            }],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "semua"]
            ],
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'ulh_log_ip',
                name: 'ulh_log_ip',
                orderable: true,
                searchable: true
            },{
                data: 'ulh_date',
                name: 'ulh_date',
                orderable: true,
                searchable: true
            }, {
                data: 'ulh_user_agent',
                name: 'ulh_user_agent',
                orderable: false,
                searchable: false
            }, ],
            "language": {
                "processing": '<img src="../../../vendor/be/assets/images/3.svg" style="width="20px; height="20px;">',
                "search": "Cari:",
                "zeroRecords": "Daftar login log tidak tersedia",
                "info": "Halaman _PAGE_ dari _PAGES_ Lainya",
                "infoEmpty": "Tidak ada daftar login log",
                "infoFiltered": "(pencarian dari _MAX_ daftar login log)",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 baris",
                "lengthMenu": "Tampilkan _MENU_ baris",
                "paginate": {
                    "previous": "sebelumnya",
                    "next": "selanjutnya"
                }
            }
        });
    });
}
function teachers(){
    
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#teachers').dataTable({
            processing: true,
            serverSide: true,
            ajax: 'teachers',
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "semua"]
            ],
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'usr_profile_picture',
                name: 'usr_profile_picture',
                render: function(data, type, full, meta) {
                    if(data != null){
                        return "<img src=\"" + data + "\"height=\"50\"/>";
                    }else{
                        return "<img src=\"vendor" + "/" + "be" + "/" + "assets" + "/" + "images" + "/" + "profile_picture"+ "/" + "avatar-2.png" + "\"height=\"50\"/>";
                    } 
                },
                orderable: true,
                searchable: true
            }, {
                data: 'tcr_nip',
                name: 'tcr_nip',
                orderable: true,
                searchable: true
            }, {
                data: 'usr_name',
                name: 'usr_name',
                orderable: true,
                searchable: true
            }, {
                data: 'tcr_entry_year',
                name: 'tcr_entry_year',
                orderable: true,
                searchable: true
            }, {
                data: 'tcr_is_active',
                name: 'tcr_is_active',
                orderable: false,
                searchable: false
            }, {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }, ],
            "language": {
                "processing": '<img src="../../../vendor/be/assets/images/3.svg" style="width="20px; height="20px;">',
                "search": "Cari:",
                "zeroRecords": "Daftar guru tidak tersedia",
                "info": "Halaman _PAGE_ dari _PAGES_ Lainya",
                "infoEmpty": "Tidak ada daftar guru",
                "infoFiltered": "(pencarian dari _MAX_ daftar guru)",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 baris",
                "lengthMenu": "Tampilkan _MENU_ baris",
                "paginate": {
                    "previous": "sebelumnya",
                    "next": "selanjutnya"
                }
            }
        });

        $('body').on('click', '.status_teacher', function() {
            var tcr_id = $(this).data("id");
            let _token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: "Status Guru",
                text: 'Apakah anda yakin ingin mengubah status guru?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'POST',
                        url: 'teacher/edit-status/' + tcr_id,
                        data: {
                            tcr_id: tcr_id,
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
                            $('#teachers').DataTable().ajax.reload()
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
}

function announcements(){
    $('body').on('click', '.status_announcement', function() {
        let _token = $('meta[name="csrf-token"]').attr('content');
        var acm_id = $(this).data("id");
        swal({
            title: "Pengumuman",
            text: 'Apakah anda yakin ingin mengubah status pengumuman?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'POST',
                    url: 'announcement/edit-status/' + acm_id,
                    data: {
                        acm_id: acm_id,
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
                        window.location.href = 'announcements';
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
}

function notifications(){
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#notification').dataTable({
            processing: true,
            serverSide: true,
            ajax: 'notifications',
            columnDefs: [{
                targets: 2,
                className: 'd-flex text-wrap',
            }],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "semua"]
            ],
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'not_title',
                name: 'not_title',
                orderable: true,
                searchable: true
            }, {
                data: 'not_message',
                name: 'not_message',
                orderable: true,
                searchable: true
            }, {
                data: 'not_is_active',
                name: 'not_is_active',
                orderable: false,
                searchable: false
            }, {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }, ],
            "language": {
                "processing": '<img src="../../../vendor/be/assets/images/3.svg" style="width="20px; height="20px;">',
                "search": "Cari:",
                "zeroRecords": "Daftar guru tidak tersedia",
                "info": "Halaman _PAGE_ dari _PAGES_ Lainya",
                "infoEmpty": "Tidak ada daftar guru",
                "infoFiltered": "(pencarian dari _MAX_ daftar guru)",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 baris",
                "lengthMenu": "Tampilkan _MENU_ baris",
                "paginate": {
                    "previous": "sebelumnya",
                    "next": "selanjutnya"
                }
            }
        });
        $('body').on('click', '#show-notification', function() {
            var not_id = $(this).data('id');
            $.get('notification/' + not_id, function(data) {
                $('#from_name').html(data.user.usr_name);
                $('#title').html(data.not_title);
                $('#message').html(data.not_message);
                $('#to_name').html(data.to_role.rol_name);
                $('#created_at').html(data.not_created_at);
                $('#is_active').html(data.not_is_active);
            })
            $('#crud-modal-show').modal('show');
        });
        $('body').on('click', '.status_notification', function() {
            let _token = $('meta[name="csrf-token"]').attr('content');
            var not_id = $(this).data("id");
            swal({
                title: "Notifikasi",
                text: 'Apakah anda yakin ingin mengubah status notifikasi?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'POST',
                        url: 'notification/edit-status/' + not_id,
                        data: {
                            not_id: not_id,
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
                            $('#notification').DataTable().ajax.reload()
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
}

function subjects(){
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#subjects').dataTable({
            processing: true,
            serverSide: true,
            ajax: "subjects",
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "semua"]
            ],
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'sbj_name',
                name: 'sbj_name',
                orderable: true,
                searchable: true
            }, {
                data: 'sbj_is_active',
                name: 'sbj_is_active',
                orderable: true,
                searchable: true
            }, {
                data: 'sbj_created_at',
                name: 'sbj_created_at',
                orderable: true,
                searchable: true
            },{
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }, ],
            "language": {
                "processing": '<img src="../../../vendor/be/assets/images/3.svg" style="width="20px; height="20px;">',
                "search": "Cari:",
                "zeroRecords": "Daftar mata pelajaran tidak tersedia",
                "info": "Halaman _PAGE_ dari _PAGES_ Lainya",
                "infoEmpty": "Tidak ada daftar mata pelajaran",
                "infoFiltered": "(pencarian dari _MAX_ daftar mata pelajaran)",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 baris",
                "lengthMenu": "Tampilkan _MENU_ baris",
                "paginate": {
                    "previous": "sebelumnya",
                    "next": "selanjutnya"
                }
            }
        });
        $('body').on('click', '.status_subject', function() {
            var sbj_id = $(this).data("id");
            let _token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: "Status Mata pelajaran",
                text: 'Apakah anda yakin ingin mengubah status mata pelajaran?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'POST',
                        url: 'subject/edit-status/' + sbj_id,
                        data: {
                            sbj_id: sbj_id,
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
                            $('#subjects').DataTable().ajax.reload()
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
}
function addSubject() {
        $("#sbj_id").val('');
        closeOnClickOutside: false,
            $('#subject-modal').modal('show');

    }

    function editSubject(event) {
        var id = $(event).data("id");
        let _url = `/subject/${id}`;
        $('#titleError').text('');

        $.ajax({
            url: _url,
            type: "GET",
            success: function(response) {
                if (response) {
                    $("#sbj_id").val(response.sbj_id);
                    $("#sbj_name").val(response.sbj_name);
                    $("#sbj_is_active").val(response.sbj_is_active);
                    $('#subject-modal').modal('show');
                }
            }
        });
    }

    function createSubject() {

        var sbj_name = $('#sbj_name').val();
        var sbj_is_active = $('#sbj_is_active').val();
        var id = $('#sbj_id').val();
        let _url = `/subject/create`;
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: _url,
            type: "POST",
            data: {
                sbj_id: id,
                sbj_name: sbj_name,
                sbj_is_active: sbj_is_active,
                _token: _token
            },

            success: function(response) {
                if (response.code == 200) {
                    $('#sbj_name').val('');
                    $('#subject-modal').modal('hide');
                    swal(response.message, {
                        button: false,
                        icon: "success",
                        timer: 1000
                    });
                    $('#subjects').DataTable().ajax.reload()
                }
            },
            error: function(response) {
                $('#sbjNameError').text(response.responseJSON.errors.sbj_name);

            },

        });
    }

    $(document).ready(function() {
        $(".reset-btn").click(function() {
            $("#form-subject").trigger("reset");
        });
    });

function teacher_teaches(){
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#teacher_teaches').dataTable({
            processing: true,
            serverSide: true,
            ajax: "teacher-teaches",
            dom: 'Bfrtip',
            dom: 
            "<'row'<'col-sm-3'B'>>" +
            "<'row'<'col-sm-6 text-left'l><'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                {
                    extend: 'pdfHtml5',
                    orientation: 'potrait',
                    pageSize: 'LEGAL'
                },
                
            ],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "semua"]
            ],
            order: [[1, 'asc']],
            rowGroup: {
                dataSrc: 1
              },
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'usr_name',
                name: 'users.usr_name',
                orderable: true,
                searchable: true
            }, {
                data: 'sbj_name',
                name: 'subjects.sbj_name',
                orderable: true,
                searchable: true
            }, {
                data: 'class_name',
                name: 'tct_class_id',
                orderable: true,
                searchable: true
            }, {
                data: 'tct_is_active',
                name: 'tct_is_active',
                orderable: false,
                searchable: false
            }, {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }, ],
            "language": {
                "processing": '<img src="../../../vendor/be/assets/images/3.svg" style="width="20px; height="20px;">',
                "search": "Cari:",
                "zeroRecords": "Daftar guru mengajar tidak tersedia",
                "info": "Halaman _PAGE_ dari _PAGES_ Lainya",
                "infoEmpty": "Tidak ada daftar guru mengajar",
                "infoFiltered": "(pencarian dari _MAX_ daftar guru mengajar)",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 baris",
                "lengthMenu": "Tampilkan _MENU_ baris",
                "paginate": {
                    "previous": "sebelumnya",
                    "next": "selanjutnya"
                }
            }
        });
        $('body').on('click', '.status_teacher_teach', function() {
            var tct_id = $(this).data("id");
            let _token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: "Guru mengajar",
                text: 'Apakah anda yakin ingin mengubah status guru mengajar ini?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'POST',
                        url: 'teacher-teach/edit-status/' + tct_id,
                        data: {
                            tct_id: tct_id,
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
                            $('#teacher_teaches').DataTable().ajax.reload()
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
}
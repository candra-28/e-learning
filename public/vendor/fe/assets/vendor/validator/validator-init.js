$(function () {
    $(".login").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            },
        },
        messages: {
            password: {
                required: "Password wajib di isi"
            },
            email: {
                required: "Email wajib di isi",
                email: "Email tidak valid"
            }
        },
    });
});

$(function () {
    $(".register-student").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            },
            password_confirmation: {
              required: true,
              equalTo: "#password"
            },
            phone_number:{
                required: true,
                minlength: 10
            },
            school_year_id: "required",
        },
        messages: {
            name: "Nama lengkap wajib di isi",
            password: {
                required: "Password wajib di isi"
            },
            email: {
                required: "Email wajib di isi",
                email: "Email tidak valid"
            },
            password:{
                required: "Kata sandi wajib di isi",
                minlength: "Minimal 8 digit karakter"
            },
            password_confirmation:{
                required: "Ulangi kata sandi wajib di isi",
                equalTo: "Ulangi kata sandi wajib sama"
            },
            entry_year: "Tahun ajaran wajib di isi",
            phone_number:{
                required: "Nomor telepon wajib di isi",
                minlength: "Minimal 10 karakter"
            },
            school_year_id: "Tahun ajaran harus di pilih",
        },
    });
});

$(function () {
    $(".register-teacher").validate({
        rules: {
            nip: "required",
            teacher_name: "required",
            teacher_email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            },
            password_confirmation: {
              required: true,
              equalTo: "#password-teacher"
            },
            entry_year:{
                required: true,
                minlength: 4,
                maxlength: 4,
            },
            phone_number:{
                required: true,
                minlength: 10
            },
        },
        messages: {
            teacher_name: "Nama lengkap wajib di isi",
            password: {
                required: "Password wajib di isi"
            },
            teacher_email: {
                required: "Email wajib di isi",
                email: "Email tidak valid"
            },
            password:{
                required: "Kata sandi wajib di isi",
                minlength: "Minimal 8 digit karakter"
            },
            password_confirmation:{
                required: "Ulangi kata sandi wajib di isi",
                equalTo: "Ulangi kata sandi wajib sama"
            },
            entry_year:{
                required: "Tahun masuk wajib di isi",
                minlength: "Tahun tidak valid",
                maxlength: "Tahun tidak valid"
            },
            nip: "NIP wajib di isi",
            phone_number:{
                required: "Nomor telepon wajib di isi",
                minlength: "Minimal 10 karakter"
            },
        },
    });
});

$(function () {
    $(".otp-verified").validate({
        rules: {
            usr_code_otp: "required"
        },
        messages: {
            usr_code_otp: "Kode OTP harus di isi"
        },
    });
});

$(function () {
    $(".forgot-password").validate({
        rules: {
            usr_email: {
                required: true,
                email: true
            }
        },
        messages: {
            usr_email: {
                required: "Alamat email harus di isi",
                email: "Alamat email tidak valid"
            }
        },
    });
});

$(function () {
    $(".reset-password").validate({
        rules: {
            usr_password: {
                required: true,
                minlength: 8
            },
            usr_retype_password:{
                required: true,
                equalTo: "#usr_password"
            }
        },
        messages: {
            usr_password: {
                required: "Kata sandi harus di isi",
                minlength: "Kata sandi minimal 8 karakter"
            },
            usr_retype_password:{
                required: "Ulangi kata sandi harus di isi",
                equalTo: "Ulangi kata sandi harus sama dengan yang awal"
            }
        },
    });
});

$(function () {
    $(".edit-password").validate({
        rules: {
            current_password: {
                required: true,
            },
            new_password:{
                required: true,
                minlength: 8
            },
            new_password_confirmation:{
                equalTo: "#new_password"
            },
        },
        messages: {
            current_password: "Kata sandi lama harus di isi",
            new_password: {
                required: "Kata sandi baru harus di isi",
                minlength: "Minimal 8 karakter"
            },
            new_password_confirmation:{
                equalTo: "Ulangi kata sandi harus sama dengan sandi baru"
            }
        },
    });
});

$(function () {
    $(".add-class").validate({
        rules: {
            cls_grade_level_id: {
                required: true,
            },
            cls_major_id: "required",
            cls_school_year_id: "required",
            cls_number: "required",
        },
        messages: {
            cls_grade_level_id: "Tingkatan kelas harus di isi",
            cls_major_id: "Jurusan harus di isi",
            cls_school_year_id: "Tahun ajaran harus di isi",
            cls_number: "Nomor kelas harus di isi",
        },
    });
});

$(function () {
    $(".edit-class").validate({
        rules: {
            cls_grade_level_id: "required",
            cls_major_id: "required",
            cls_school_year_id: "required",
            cls_number: "required",
            cls_is_active: "required",
        },
        messages: {
            cls_grade_level_id: "Tingkatan kelas harus di isi",
            cls_major_id: "Jurusan harus di isi",
            cls_school_year_id: "Tahun ajaran harus di isi",
            cls_number: "Nomor kelas harus di isi",
            cls_is_active: "Status kelas harus di isi",
        },
    });
});

$(function () {
    $(".add-major").validate({
        rules: {
            mjr_name: "required",
            mjr_thumnail: "required",
            mjr_description: "required",
        },
        messages: {
            mjr_name: "Nama jursan harus di isi",
            mjr_thumnail: "Thumnail harus di isi",
            mjr_description: "Deskripsi Jurusan harus di isi harus di isi",
        },
    });
});

$(function () {
    $(".edit-major").validate({
        rules: {
            mjr_name: "required",
            
            mjr_description: "required",
        },
        messages: {
            mjr_name: "Nama jursan harus di isi",

            mjr_description: "Deskripsi Jurusan harus di isi harus di isi",
        },
    });
});

$(function () {
    $(".update-profile").validate({
        rules: {
            usr_name: "required",
            usr_phone_number:{
                required: true,
                minlength: 10
            }
        },
        messages: {
            usr_name: "Nama harus di isi",
            usr_phone_number: {
                required: "Nomor Telepon harus di isi",
                minlength: "Minimal 10 digit"
            },
        },
    });
});

$(function () {
    $(".edit-email").validate({
        rules: {
            new_usr_email:{
                required: true,
                email: true,
            },
            usr_password:{
                required: true,
            }
        },
        messages: {
            new_usr_email: {
                required: "Alamat email harus di isi",
                email: "Alamat email tidak valid"
            },
            usr_password: {
                required: "Kata sandi harus di isi",
            },
        },
    });
});

$(function () {
    $(".add-announcement").validate({
        rules: {
            acm_title:{
                required: true,
            },
            acm_upload_file:{
                required: true,
            }
        },
        messages: {
            acm_title: {
                required: "Judul pengumuman harus di isi",
            },
            acm_upload_file: {
                required: "Upload pengumuman harus di isi",
            },
        },
    });
});

$(function () {
    $(".edit-announcement").validate({
        rules: {
            acm_title:{
                required: true,
            },
        },
        messages: {
            acm_title: {
                required: "Judul pengumuman harus di isi",
            },
        },
    });
});

$(function () {
    $(".add-student").validate({
        rules: {
            usr_name:{
                required: true,
            },
            usr_phone_number: {
                minlength: 10,
                required: true
            },
            stu_nis: "required",
            usr_email:{
                required: true,
                email: true
            },
            stu_school_year_id: "required"
        },
        messages: {
            usr_name: {
                required: "Nama lengkap harus di isi",
            },
            usr_phone_number:{
                required: "Nomor telepon harus di isi",
                minlength: "Minimal 10 digit"
            },
            stu_nis: "Nomor induk siswa harus di isi",
            usr_email: {
                email: "Email tidak valid",
                required: "Alamat email harus di isi"
            },
            stu_school_year_id: "Tahun ajaran harus di pilih"
        },
    });
});


$(function () {
    $(".edit-student").validate({
        rules: {
            usr_name:{
                required: true,
            },
            usr_phone_number: {
                minlength: 10,
                required: true
            },
            stu_nis: "required",
            stu_school_year_id: "required"
        },
        messages: {
            usr_name: {
                required: "Nama lengkap harus di isi",
            },
            usr_phone_number:{
                required: "Nomor telepon harus di isi",
                minlength: "Minimal 10 digit"
            },
            stu_nis: "Nomor induk siswa harus di isi",
            stu_school_year_id: "Tahun ajaran harus di pilih"
        },
    });
});

$(function () {
    $(".add-notification").validate({
        rules: {
            not_title:{
                required: true,
            },
            not_to_role_id: {
                minlength: 10,
                required: true
            },
            not_message: "required",
        },
        messages: {
            not_title: {
                required: "Judul notifikasi harus di isi",
            },
            not_to_role_id:"Tujuan notifikasi harus di pilih",
            not_message: "Nomor induk siswa harus di isi",
        },
    });
});

$(function () {
    $(".add-subject").validate({
        rules: {
            sbj_name:{
                required: true,
            },
        },
        messages: {
            sbj_name: {
                required: "Nama mata pelajaran harus di isi",
            },
        },
    });
});

$(function () {
    $(".add-teacher").validate({
        rules: {
            usr_name:{
                required: true,
            },
            usr_phone_number: {
                minlength: 10,
                required: true
            },
            tcr_nip: "required",
            usr_email:{
                required: true,
                email: true
            },
            stu_school_year_id: "required",
            tcr_entry_year: "required"
        },
        messages: {
            usr_name: {
                required: "Nama lengkap harus di isi",
            },
            usr_phone_number:{
                required: "Nomor telepon harus di isi",
                minlength: "Minimal 10 digit"
            },
            tcr_nip: "Nomor induk kepegawaian harus di isi",
            usr_email: {
                email: "Email tidak valid",
                required: "Alamat email harus di isi"
            },
            stu_school_year_id: "Tahun ajaran harus di pilih",
            tcr_entry_year: "Tahun masuk harus di isi"
        },
    });
});
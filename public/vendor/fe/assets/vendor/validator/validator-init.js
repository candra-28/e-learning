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
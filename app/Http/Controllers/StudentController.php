<?php

namespace App\Http\Controllers;

use Symfony\Component\Console\Input\Input;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use DataTables;
use App\Models\Classes;
use Illuminate\Http\Response;
use App\Models\Major;
use App\Models\StudentClass;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\UserHasRole;
use Illuminate\Support\Facades\Mail;
use App\Mail\AddStudent;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $students = Student::getListStudents($request->query());
            return Datatables::of($students)
                ->editColumn("stu_is_active", function ($student) {

                    if ($student->stu_is_active == "1") {
                        return '<label class="badge badge-success">aktif</label>';
                    } elseif ($student->stu_is_active == "0") {
                        return '<label class="badge badge-danger">tidak aktif</label>';
                    } else {
                        return "Tidak punya status aktif";
                    }
                })
                ->addIndexColumn()
                ->addColumn('action', function ($student) {
                    $detail = '<a href="' . url('student', $student->stu_id) . '"  type="button" data-toggle="tooltip" data-original-title="Detail" class="btn btn-warning btn-sm"><i class="mdi mdi-mdi mdi mdi-eye"></i></a>';
                    $edit = '<a href="' . url('student/edit', $student->stu_id) . '"  type="button" data-toggle="tooltip" data-original-title="Edit" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';
                    $status = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $student->stu_id . '" data-original-title="Delete" class="btn btn-danger btn-sm status_student"><i class="mdi mdi-information-outline"></i></a>';
                    return $detail . '&nbsp' . $edit . '&nbsp' . $status;
                })->rawColumns(['action', 'stu_is_active'])
                ->make(true);
        }
        return view('back-learning.students.index');
    }

    public function create()
    {
        $classes = Classes::where('cls_is_active', true)->get();
        $majors = Major::get();
        $school_years = SchoolYear::where('scy_is_active', true)->get();
        return view('back-learning.students.create', compact('classes', 'school_years', 'majors'));
    }

    public function getClasses($school_yearID)
    {
        $classes = Classes::join('majors', 'classes.cls_major_id', '=', 'majors.mjr_id')
            ->join('grade_levels', 'classes.cls_grade_level_id', '=', 'grade_levels.grl_id')
            ->where('cls_school_year_id', $school_yearID)
            ->select('classes.cls_id', 'classes.cls_number', 'grade_levels.grl_name', 'majors.mjr_name')
            ->get();

        return response()->json(compact('classes'));
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->usr_name = $request->usr_name;
        $user->usr_email = $request->usr_email;
        $rand_string                = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 6);
        $rand_int                   = substr(str_shuffle('0123456789'), 0, 4);
        $rand_password              = $rand_string . $rand_int;
        $user->usr_password         = Hash::make($rand_password);
        $user->usr_phone_number = $request->usr_phone_number;
        $user->usr_otp_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->usr_gender = $request->usr_gender;
        $user->usr_place_of_birth = $request->usr_place_of_birth;
        $user->usr_date_of_birth = $request->usr_date_of_birth;
        $user->usr_religion = $request->usr_religion;
        $user->usr_address = $request->usr_address;
        $user->usr_is_active = 1;
        $user->usr_created_by = Auth()->user()->usr_id;
        Mail::to($user['usr_email'])->send(new AddStudent($user, $rand_password));
        if ($request->hasFile('usr_profile_picture')) {
            $files = $request->file('usr_profile_picture');
            $path = public_path('vendor/be/assets/images/profile_picture');
            $files_name = 'vendor' . '/' . 'be' . '/' . 'assets' . '/' . 'images' . '/' . 'profile_picture' . '/' . date('Ymd') . '_' . $files->getClientOriginalName();
            $files->move($path, $files_name);
            $user->usr_profile_picture = $files_name;
        }

        if ($user->save()) {
            $roles = new UserHasRole;
            $roles->uhs_user_id = $user->usr_id;
            $roles->uhs_role_id = 4;
            $roles->uhs_created_by = Auth()->user()->usr_id;
            $roles->save();

            $student = new Student;
            $student->stu_user_id = $user->usr_id;
            $student->stu_nis = $request->stu_nis;
            $student->stu_school_year_id = $request->stu_school_year_id;
            $student->stu_is_active = 1;
            $student->stu_created_at = Auth()->user()->usr_id;
            $student->save();
            if ($request->filled('class_id')) {
                $student_class = new StudentClass;
                $student_class->stc_student_id = $student->stu_id;
                $student_class->stc_class_id = $request->class_id;
                $student_class->stc_is_active = 1;
                $student_class->stc_created_by = Auth()->user()->usr_id;
                $student_class->save();
            }
        } else {
            return back()->with('error', 'Siswa gagal ditambahkan, terjadi kesalahan sistem');
        }
        return redirect('students')->with('success', 'Siswa berhasil di tambahkan');
    }
    public function edit($studentID)
    {
        $student = Student::join('users', 'students.user_id', '=', 'users.id')->select(
            'users.*',
            'students.*'
        )->find($studentID);
        // dd($studentID, $student->id);
        return view('students.edit', ['student' => $student]);
    }
    public function update(Request $request, $studentID)
    {
        $request->validate(
            [
                'name'  => 'required',
                'phone_number'  => 'required',
                'nis'   => 'required'
            ],

            $message = [
                'name.required' => 'Nama siswa tidak boleh kosong',
                'phone_number.required' => 'Nomor telepon tidak boleh kosong',
                'nis.required'  => 'Nis tidak boleh kosong'
            ]
        );

        $student = Student::where('id', $studentID)->first();
        $student->nis = $request->nis;
        $student->update();

        $user = User::where('id', $student->user_id)->firstOrFail();
        $user->name = $request->name;
        $user->entry_year = $request->entry_year;
        $user->phone_number = $request->phone_number;
        $user->gender = $request->gender;
        $user->place_of_birth = $request->place_of_birth;
        $user->date_of_birth = $request->date_of_birth;
        $user->religion = $request->religion;
        $user->address = $request->address;
        $user->is_active = $request->is_active;
        $user->update();
        return redirect('/students');
    }
    public function show($studentID)
    {
        $student = Student::where('stu_id', $studentID)->first();
        $classes = Classes::join('student_classes', 'student_classes.stc_class_id', '=', 'classes.cls_id')
            ->where('student_classes.stc_student_id', $student->stu_id)->get();
        return view('back-learning.students.show', ['student' => $student, 'classes' => $classes]);
    }

    public function updateStatusStudent($studentID)
    {
        $student = Student::findOrFail($studentID);
        if ($student->stu_is_active == false) {
            $student->stu_is_active = 1;
            $user = $student->user;
            $user->usr_is_active = 1;
            $user->usr_updated_by = Auth()->user()->usr_id;
            $user->update();
        } else {
            $student->stu_is_active = 0;
            $user = $student->user;
            $user->usr_is_active = 0;
            $user->usr_updated_by = Auth()->user()->usr_id;
            $user->update();
        }
        $student->stu_updated_by = Auth()->user()->usr_id;
        $student->update();
        return response()->json(['code' => 200, 'message' => 'Status siswa berhasil di ubah', 'data' => $student], 200);
    }
}

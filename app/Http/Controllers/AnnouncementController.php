<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $announcements = Announcement::where('acm_is_active', true)->paginate(3);
        // dd($announcements);
        if ($request->ajax()) {
            $announcement = Announcement::where('acm_is_active', true)->simplePaginate(3);
            return view('back-learning.announcements.index', ['announcement' => $announcement])->render();
        }

        return view('back-learning.announcements.index', ['announcements' => $announcements]);
    }

    public function fetch(Request $request)
    {
    }
    public function create()
    {
        return view('back-learning.announcements.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'acm_description'   => 'required'
        ], [
            'acm_description.required'  => "Deskripsi pengumuman harus di isi"
        ]);

        $user = User::findOrFail(Auth::user()->usr_id);
        $announcement_check = Announcement::where('acm_title', $request->acm_title)
            ->where('acm_description', $request->acm_description)->count();
        if ($announcement_check == 0) {
            $announcement = new Announcement;
            $announcement->acm_title = $request->acm_title;
            $announcement->acm_slug = Str::slug($request->acm_title);
            $announcement->acm_description = $request->acm_description;
            $announcement->acm_user_id = $user->usr_id;
            $announcement->acm_created_by = $user->usr_id;

            if ($request->hasFile('acm_upload_file')) {
                $files = $request->file('acm_upload_file');
                $path = public_path('vendor/be/assets/images/announcements');
                $files_name = 'vendor' . '/' . 'be' . '/' . 'assets' . '/' . 'images' . '/' . 'announcements' . '/' . date('Ymd') . '_' . $files->getClientOriginalName();
                $files->move($path, $files_name);
                $announcement->acm_upload_file = $files_name;
            }
            $announcement->acm_is_active = 1;
            $announcement->save();
            return redirect('announcements')->with('success', 'Pengumuman berhasil di tambahkan');
        }
        return back()->with('error', 'Pengumuman sudah tersedia');
    }

    public function getSlug(Request $request)
    {
        // dd($request);
        $slug = Str::slug($request->get('acm_slug'));

        $announcements = Announcement::where('acm_is_active', true)->where('acm_slug', 'LIKE', "%{$slug}%")->get();

        return view('back-learning.announcements.slug-show', ['announcements' => $announcements]);
    }

    public function show($announcementID)
    {
        $announcement = Announcement::where('acm_id', $announcementID)->firstOrFail();
        return view('back-learning.announcements.show', ['announcement' => $announcement]);
    }

    public function updateStatusAnnouncement($announcementID)
    {
        $announcement = Announcement::findOrFail($announcementID);
        // dd($class);
        if ($announcement->acm_is_active == false) {
            $announcement->acm_is_active = 1;
        } else {
            $announcement->acm_is_active = 0;
        }
        $announcement->acm_updated_by = Auth()->user()->usr_id;
        $announcement->update();
        return response()->json(['code' => 200, 'message' => 'Status pengumuman berhasil di ubah', 'data' => $announcement], 200);
    }

    public function destroy($announcementID)
    {
        $announcement = Announcement::find($announcementID);
        $announcement->delete();
        return redirect()->back();
    }
    public function edit($announcementID)
    {
        $announcement = Announcement::find($announcementID);
        return view('back-learning.announcements.edit', compact('announcement'));
    }
    public function update(Request $request, $announcementID)
    {
        $request->validate([
            'acm_description'   => 'required'
        ], [
            'acm_description.required'  => "Deskripsi pengumuman harus di isi"
        ]);

        $user = User::findOrFail(Auth::user()->usr_id);
        $announcement_check = Announcement::where('acm_title', $request->acm_title)
            ->where('acm_description', $request->acm_description)->where('acm_upload_file', $request->file('acm_upload_file'))->count();
        if ($announcement_check == 0) {
            $announcement = Announcement::where('acm_id', $announcementID)->firstOrFail();
            $announcement->acm_title = $request->acm_title;
            $announcement->acm_slug = Str::slug($request->acm_title);
            $announcement->acm_description = $request->acm_description;
            $announcement->acm_user_id = $user->usr_id;
            $announcement->acm_updated_by = $user->usr_id;

            if ($request->hasFile('acm_upload_file')) {
                $files = $request->file('acm_upload_file');
                $path = public_path('vendor/be/assets/images/announcements');
                $files_name = 'vendor' . '/' . 'be' . '/' . 'assets' . '/' . 'images' . '/' . 'announcements' . '/' . date('Ymd') . '_' . $files->getClientOriginalName();
                $files->move($path, $files_name);
                $announcement->acm_upload_file = $files_name;
            }
            $announcement->update();
            return redirect('announcements')->with('success', 'Pengumuman berhasil di ubah');
        }
        return back()->with('error', 'Pengumuman sudah tersedia');
    }
}

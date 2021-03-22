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

        $announcements = Announcement::where('acm_slug', 'LIKE', "%{$slug}%")->get();

        return view('back-learning.announcements.slug-show', ['announcements' => $announcements]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show($announcementID)
    {
        $announcement = Announcement::where('acm_id', $announcementID)->firstOrFail();
        return view('back-learning.announcements.show', ['announcement' => $announcement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy($announcementID)
    {
        $announcement = Announcement::find($announcementID);
        $announcement->delete();
        return redirect()->back();
    }
}

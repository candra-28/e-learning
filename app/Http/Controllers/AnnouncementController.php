<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::join('users', 'announcements.user_id', '=', 'users.id')
            ->select(
                'users.*',
                'announcements.*',
                'users.id as id_user'
            )->get();
        return view('announcements.index', ['announcements' => $announcements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
        ];

        $customMessages = [
            'required' => 'Opps.. Kolom Wajib Terisi'
        ];

        $this->validate($request, $rules, $customMessages);

        $user = User::findOrFail(Auth::user()->id);

        $announcement = new Announcement;
        $announcement->title = $request->title;
        $announcement->slug = Str::slug($request->title);
        $announcement->description = $request->description;
        $announcement->user_id = $user->id;

        if ($request->hasFile('upload_type')) {
            $files = $request->file('upload_type');
            $path = public_path('announcement' . '/' . $user->name);
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $files_name = $files->getClientOriginalName();
            $files->move($path, $files_name);
            $announcement->upload_type = $files_name;
        }

        $announcement->save();

        return redirect('announcements');
    }

    public function getSlug(Request $request)
    {
        // dd($request);
        $slug = Str::slug($request->get('slug'));

        $announcements = Announcement::join('users', 'announcements.user_id', '=', 'users.id')
            ->select(
                'users.*',
                'users.id as is_users',
                'announcements.*',
            )->where('slug', 'LIKE', "%{$slug}%")->get();

        return view('announcements.slug-show', ['announcements' => $announcements]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show($announcementID)
    {

        $announcement = Announcement::join('users', 'announcements.user_id', '=', 'users.id')->where('announcements.id', $announcementID)->first();
        return view('announcements.show', ['announcement' => $announcement]);
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

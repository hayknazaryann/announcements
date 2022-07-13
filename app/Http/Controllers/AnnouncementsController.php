<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementStoreRequest;
use App\Http\Resources\AnnouncementCollection;
use App\Http\Resources\Announcement as AnnouncementResource;
use App\Models\Announcement;
use Illuminate\Http\Response;

class AnnouncementsController extends Controller
{

    public function index()
    {
        return (new AnnouncementCollection(Announcement::paginate(2)))->response()->setStatusCode(Response::HTTP_OK);
    }


    public function store(AnnouncementStoreRequest $request)
    {
        try {
            $announcement = Announcement::create($request->all());
            return response()->json(['success' => true, 'id' => $announcement->id], Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'message' => 'something went wrong'], Response::HTTP_BAD_REQUEST);
        }
    }


    public function show($id)
    {
        return (new AnnouncementResource(Announcement::find($id)))->response()->setStatusCode(Response::HTTP_OK);
    }

}

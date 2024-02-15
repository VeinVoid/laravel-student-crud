<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('created_at', 'asc')
            ->get();
        return response()->json($banners);
    }

    public function getLatestBanners()
    {
        $banners = Banner::orderBy('created_at', 'asc')
            ->take(4)
            ->get();
        return response()->json($banners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable',
            'url' => 'nullable',
            'detailBanner' => 'nullable',
        ]);

        $banner = Banner::create([
            'title' => $request->title,
            'url' => $request->url,
            'detailBanner' => $request->detailBanner,
        ]);

        return response()->json(['banner' => $banner], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
        $res = $banner->where('status', 'publish')
            ->first();
        return response()->json($res);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'nullable',
            'url' => 'nullable',
            'detailBanner' => 'nullable',
        ]);

        $banner->update([
            'title' => $request->title,
            'url' => $request->url,
            'detailBanner' => $request->detailBanner,
        ]);

        return response()->json(['message' => 'Banner updated successfully', 'banner' => $banner], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return response()->json(['message' => 'Banner deleted successfully'], 200);
    }
}

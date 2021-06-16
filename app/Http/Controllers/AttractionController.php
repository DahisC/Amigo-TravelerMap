<?php

namespace App\Http\Controllers;

use App\helpers;
use App\Attraction;
use App\AttractionImage;
use App\AttractionPosition;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AttractionRequest;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
    public function store(AttractionRequest $request)
    {
        // 地點轉Px、Py
        $response = helpers::getAddressLatLng($request->address);

        $attraction = Attraction::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'website' => $request->website,
            'tel' => $request->tel,
            'description' => $request->description,
            'ticket_info' => $request->ticket_info ?? '',
            'traffic_info' => $request->traffic_info ?? '',
            'parking_info' => $request->parking_info ?? '',
        ]);
        //position
        $attraction->position()->save(
            AttractionPosition::make([
                'country' => $request->country,
                'region' => $request->region,
                'town' => $request->town,
                'address' => $request->address,
                'lat' =>  $response['lat'],
                'lng' => $response['lng'],
            ])
        );
        //img
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('attractions');
            $attraction->images()->save(
                AttractionImage::make([
                    'url' => $path,
                    'image_desc' => $request->image_desc ?? '',
                ])
            );
        };
        return redirect()->route('backstage.attractions.index');
    }

    public function update(AttractionRequest $request,Attraction $attraction)
    {
        dd($request->all());
        $attraction->update($request->all());
        $attraction->position->update($request->all());

        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('attractions');
            AttractionImage::updateOrCreate([
                'attraction_id' => $attraction->id,
                'url' => $path,
            ], [
                'image_desc' => $request->image_desc ?? '',
            ]);
        };


        return redirect()->route('backstage.attractions.index');
    }

    public function destroy(Attraction $attraction)
    {
        $attraction->delete();
        $attraction->position->delete();
        //開始刪img model跟圖片

        $attraction->images->each(function ($img) {
            Storage::delete($img->url);
            $img->delete();
        });
        return redirect()->route('backstage.attractions.index');
    }
}

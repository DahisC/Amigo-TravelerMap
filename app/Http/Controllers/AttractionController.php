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
        //這邊要防亂傳地址
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
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key=>$image) {
                $path = $image->store('attractions');
                $attraction->images()->save(
                    AttractionImage::make([
                        'url' => $path,
                        'image_desc' => $request->image_desc[$key] ?? '',
                    ])
                );
            }
        };
        return redirect()->route('backstage.attractions.index');
    }

    public function update(Request $request, Attraction $attraction)
    {
        $attraction->update($request->all());
        //positcion
        $response = helpers::getAddressLatLng($request->address);
        //之後有空試看看 集合增加的方法
        $attraction->position->update([
            'country' => $request->country,
            'region' => $request->region,
            'town' => $request->town,
            'address' => $request->address,
            'lat' =>  $response['lat'],
            'lng' => $response['lng'],
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key=>$image) {
                $path = $image->store('attractions');
                AttractionImage::updateOrCreate([
                    'attraction_id' => $attraction->id,
                    'url' => $path,
                ], [
                    'image_desc' => $request->image_desc[$key] ?? '',
                ]);
            };
        };


        return redirect()->route('backstage.attractions.index');
    }

    public function destroy(Attraction $attraction)
    {
        $attraction->delete();
        $attraction->position->delete();
        $attraction->tags()->detach();
        //開始刪img model跟圖片

        $attraction->images->each(function ($img) {
            Storage::delete($img->url);
            $img->delete();
        });
        return redirect()->route('backstage.attractions.index');
    }
}

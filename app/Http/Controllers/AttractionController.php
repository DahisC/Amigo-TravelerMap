<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use App\helpers;
use App\Attraction;
use App\AttractionImage;
use App\AttractionPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AttractionRequest;

class AttractionController extends Controller
{
    public function store(AttractionRequest $request)
    {
        $user = Auth::user();
        if (Gate::allows('viewAny', Attraction::class)) {
            if ($user->role == "Admin") {
                // 地點轉Px、Py、防止亂傳地址
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
                    foreach ($request->file('images') as $key => $image) {
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
            if (Gate::allows('create', Attraction::class)) {
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
                    foreach ($request->file('images') as $key => $image) {
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
        }
        return view('backstage.index');  //很抱歉，您的權限不足，發送火箭享尊榮服務
    }


    public function update(AttractionRequest $request, Attraction $attraction)
    {
        $user = Auth::user();
        // $tags = Tag::get();

        if (Gate::allows('viewAny', $attraction)) {
            if ($user->role == "Admin") {

                $attraction->update([
                    'name' => $request->name,
                    'website' => $request->website,
                    'tel' => $request->tel,
                    'description' => $request->description,
                    'ticket_info' => $request->ticket_info ?? '',
                    'traffic_info' => $request->traffic_info ?? '',
                    'parking_info' => $request->parking_info ?? '',
                ]);
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
                    foreach ($request->file('images') as $key => $image) {
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

            if (Gate::allows('update', $attraction)) {
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
                    foreach ($request->file('images') as $key => $image) {
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
            return view('backstage.index'); //很抱歉，您的權限不足，發送火箭享尊榮服務
        }
    }



    public function destroy(Attraction $attraction)
    {
        $user = Auth::user();

        if (Gate::allows('viewAny', $attraction)) {
            if ($user->role == "Admin") {
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
            if (Gate::allows('update', $attraction)) {
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

        return view('backstage.index'); //很抱歉，您的權限不足，發送火箭享尊榮服務
        // return redirect()->back()->with('message', 'IT WORKS!');
    }



    public function favorite($id)
    {
        $attraction = Attraction::find($id);
        $isFavorited = Attraction::where('id', $id)->whereHas('users', function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->get()->count();

        if (!$isFavorited) $attraction->users()->attach(auth()->user()->id);
        else $attraction->users()->detach(auth()->user()->id);
        $userFavorites = User::with('attractions')->find(auth()->user()->id)->attractions->pluck('id');

        return ['userFavorites' => $userFavorites];
    }
    public function getAttractions(Request $request)
    {
        // $userFavorites = User::with('attractions')->find(auth()->user()->id)->attractions->pluck('id');
        $userFavorites = User::favorites();
        if ($request->lat && $request->lng) {
            $attractions = Attraction::queryNearbyAttractions($request->lat, $request->lng, 3)->with('position', 'images', 'tags')->get();
        } else {
            $attractions = Attraction::with('tags', 'position', 'images')->inRandomOrder()->take(100)->get();
        }
        return response(compact('attractions', 'userFavorites'));
    }
    public function addIntoPersonalMap()
    {
        // 將地點放入個人地圖
    }
}

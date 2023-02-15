<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Spot;
use App\Models\SpotLike;
use App\Models\SpotReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SpotController extends Controller
{

    private $relations = [
        'spot_comments.user',
        'user',
        'spot_likes.user',
        'spot_review.user',
        'spot_user_like'
    ];

    private $count = [
        'spot_comments',
        'spot_likes',
        'spot_reviews',
    ];

    public function model(Request $request)
    {
        $this->relations['spot_comments'] = function ($query) {
            return $query->limit(20);
        };

        
        $this->relations['spot_user_like'] = function ($query) use($request) {
            return $query->limit(20)->where('user_id', $request->user_id);
        };
        
        $this->relations['spot_likes'] = function ($query) {
            return $query->limit(20)->where('is_like', 'Ya');
        };
        
        $this->count['spot_likes'] = function ($query) {
            return $query->where('is_like', 'Ya');
        };

        $this->relations['spot_reviews'] = function ($query) {
            return $query->limit(20);
        };

        $spot = (new Spot())->withCount($this->count);
        
        

        $spot = $spot->withAvg('spot_reviews', 'rate');

        return $spot->with($this->relations)->first();
    }

    public function index(Request $request)
    {
        $this->relations['spot_comments'] = function ($query) {
            return $query->limit(20);
        };

        $this->relations['spot_user_like'] = function ($query) use($request) {
            return $query->limit(20)->where('user_id', $request->user_id);
        };
        
        
        $this->relations['spot_likes'] = function ($query) {
            return $query->limit(20)->where('is_like', 'Ya');
        };
        
        $this->count['spot_likes'] = function ($query) {
            return $query->where('is_like', 'Ya');
        };

        $this->relations['spot_reviews'] = function ($query) {
            return $query->limit(20);
        };

        $spot = (new Spot())->withCount($this->count);

        $spot = $spot->withAvg('spot_reviews', 'rate');
        
        if($request->order_by) {
            $spot->orderByDesc($request->order_by);
        }

        $spot = $spot->with($this->relations);

        if ($request->last_id) {
            $spot = $spot->where('id', '>', $request->last_id);
        }

        if ($request->limit) {

            $spot = $spot->limit($request->limit);
        }

        if ($request->where) {

            $spot = DB::select("select * from spot where $request->where");
        }

        $spot = $spot->get();

        return response()->json([
            "success" => true,
            'data' => $spot
        ]);
    }

    public function getSpotHistoryReview(Request $request)
    {
        $this->relations['spot_comments'] = function ($query) {
            return $query->limit(20);
        };

        $this->relations['spot_user_like'] = function ($query) use($request) {
            return $query->limit(20)->where('user_id', $request->user_id);
        };
        
        
        $this->relations['spot_likes'] = function ($query) {
            return $query->limit(20)->where('is_like', 'Ya');
        };
        
        $this->count['spot_likes'] = function ($query) {
            return $query->where('is_like', 'Ya');
        };

        $this->relations['spot_reviews'] = function ($query) {
            return $query->limit(20);
        };

        $spot = (new Spot())->withCount($this->count);
        
        if($request->order_by) {
            $spot->orderByDesc($request->order_by);
        }

        $spot = $spot->withAvg('spot_reviews', 'rate');

        $spot = $spot->with($this->relations);

        if ($request->last_id) {
            $spot = $spot->where('id', '>', $request->last_id);
        }

        if ($request->user_id) {
            $spot = $spot->whereHas('spot_reviews', function ($query) use ($request) {
                $query->where('user_id', $request->user_id);
            });
        }

        if ($request->limit) {

            $spot = $spot->limit($request->limit);
        }

        if ($request->where) {

            $spot = DB::select("select * from spot where $request->where");
        }

        $spot = $spot->get();

        return response()->json([
            "success" => true,
            'data' => $spot
        ]);
    }

    public function search(Request $request)
    {
        $this->relations['spot_comments'] = function ($query) {
            return $query->limit(20);
        };

        $this->relations['spot_user_like'] = function ($query) use($request) {
            return $query->limit(20)->where('user_id', $request->user_id);
        };
        
        
        $this->relations['spot_likes'] = function ($query) {
            return $query->limit(20)->where('is_like', 'Ya');
        };
        
        $this->count['spot_likes'] = function ($query) {
            return $query->where('is_like', 'Ya');
        };

        $this->relations['spot_reviews'] = function ($query) {
            return $query->limit(20);
        };

        $spot = (new Spot())->withCount($this->count);
        
        if($request->order_by) {
            $spot->orderByDesc($request->order_by);
        }

        $spot = $spot->withAvg('spot_reviews', 'rate');

        $spot = $spot->with($this->relations);

        if ($request->last_id) {
            $spot = $spot->where('id', '>', $request->last_id);
        }

        if ($request->limit) {

            $spot = $spot->limit($request->limit);
        }

        if ($request->keyword) {

            $spot = $spot->where('judul', 'like', '%' . $request->keyword . '%');
        }

        if ($request->where) {

            $spot = DB::select("select * from spot where $request->where");
        }

        $spot = $spot->get();

        return response()->json([
            "success" => true,
            'data' => $spot
        ]);
    }

    public function store(Request $request)
    {

    }

    public function addSpot(Request $request)
    {
        $requestData = json_decode($request->all()['data'], true);

        $validator = Validator::make($requestData, [
            'user_id' => 'required|string|max:40|unique:user,id',
            'nama' => 'required',
            'isi' => 'required|min:30',
            'gambar' => 'required',
            'lokasi' => 'required',
            'rate' => 'required',
        ]);

        $gambar = "";
        if ($request->hasFile('gambar')) {
            $gambar = str_replace("\\", "/", $request->file("gambar")
                ->move('uploads', time() . "." . $request->file("gambar")->getClientOriginalExtension()));
        }

        DB::transaction(function () use ($request, $requestData, $gambar) {
            $spotCreate = Spot::create([
                'user_id' => $requestData['user_id'],
                'nama' => $requestData['nama'],
                'gambar' => $gambar,
                'lokasi' => $requestData['lokasi'],
            ]);

            SpotReview::create([
                'spot_id' => $spotCreate->id,
                'user_id' => $requestData['user_id'],
                'rate' => $requestData['rate'],
                'isi' => $requestData['isi']
            ]);
        });

        return response()->json([
            "success" => true,
            "message" => "Berhasil menambahkan review"
        ]);
    }

    public function addSpotReview(Request $request)
    {
        $requestData = json_decode($request->all()['data'], true);

        $validator = Validator::make($requestData, [
            'spot_id' => 'required|string|max:40|unique:spot,id',
            'user_id' => 'required|string|max:40|unique:user,id',
            'isi' => 'required|min:30',
            'rate' => 'required',
        ]);

        DB::transaction(function () use ($request, $requestData) {
            SpotReview::create([
                'spot_id' => $requestData['spot_id'],
                'user_id' => $requestData['user_id'],
                'isi' => $requestData['isi'],
                'rate' => $requestData['rate'],
            ]);
        });

        return response()->json([
            "success" => true,
            "message" => "Berhasil menambahkan review"
        ]);
    }

    public function addSpotLIke(Request $request)
    {
        if ($spotLike = SpotLike::where($request->all())->first()) {
            if ($spotLike->is_like == "Ya") {
                $spotLike->update([
                    'is_like' => 'Tidak'
                ]);
            } else {
                $spotLike->update([
                    'is_like' => 'Ya'
                ]);
            }
        } else {
            SpotLike::create($request->all());
        }

        return response()->json([
            "success" => true,
            "message" => "Berhasil mengupdate like"
        ]);
    }

    public function getSpot(Request $request)
    {
        $this->relations['spot_comments'] = function ($query) {
            return $query->limit(20);
        };

        $this->relations['spot_user_like'] = function ($query) use($request) {
            return $query->limit(20)->where('user_id', $request->user_id);
        };
        
        $this->relations['spot_likes'] = function ($query) {
            return $query->limit(20)->where('is_like', 'Ya');
        };
        
        $this->count['spot_likes'] = function ($query) {
            return $query->where('is_like', 'Ya');
        };

        $this->relations['spot_reviews'] = function ($query) {
            return $query->limit(20);
        };

        $spot = (new Spot())->withCount($this->count);
        
        if($request->order_by) {
            $spot->orderByDesc($request->order_by);
        }

        $spot = $spot->with($this->relations);
        $spot = $spot->withAvg('spot_reviews', 'rate');
        
        if ($spot = $spot->where(['id' => $request->spot_id])->first()) {
            return response()->json([
                "success" => true,
                "data" => $spot
            ]);
        } 

        return response()->json([
            "success" => false,
            "message" => "Spot tidak ditemukan!"
        ]);
    }
    
    public function checkUserSpotLike(Request $request)
    {
        if ($spotLike = SpotLike::where($request->all())->first()) {
            return response()->json([
                "success" => true,
                "is_like" => $spotLike->is_like,
            ]);
        } 

        return response()->json([
            "success" => true,
            "is_like" => 'Tidak'
        ]);
    }
}

//
//      
//keytool -exportcert -alias androiddebugkey -keystore "C:/Users/ramdan3mts/.android/debug.keystore" | "C:/Users/ramdan3mts/Downloads/openssl-0.9.8k_X64/bin/openssl" sha1 -binary | "C:/Users/ramdan3mts/Downloads/openssl-0.9.8k_X64/bin/openssl" base64
//      

<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DonationController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['create','store','show','edit','update','destroy']),
        ];
    }

    public function index()
    {
        $donations = Donation::orderByRaw("CASE WHEN status = 'aktif' THEN 0 WHEN status = 'selesai' THEN 1 ELSE 2 END")
	                        ->orderBy('take')
		                     ->paginate(10);
        return view("pages.donation.index",["donations"=>$donations]);
    }
    public function create()
    {
        $sponsors = Sponsor::all();
        return view("pages.donation.create",["sponsors"=>$sponsors]);
    }
    public function store(Request $request)
    {
        // dd(Sponsor::class);
        $data = $request->all();
        $data['remain'] = $request->quota;
        $data['status'] = "aktif";
        Donation::create($data);
        return redirect(route('donation.index'));
    }
    public function show(Donation $donation)
    {

        return view("pages.donation.show",["donation"=>$donation,"heroes"=>$donation->heroes(),"foods"=>$donation->foods()]);
    }
    public function edit(Donation $donation)
    {
        return view("pages.donation.edit",["donation"=>$donation]);
    }
    public function update(Request $request, Donation $donation)
    {
        if($request->notes){
            $donation->notes = $request->notes;
            $donation->save(); 
            return back();
        }
        $donation->take = $request->take;
        $donation->status = $request->status;
        $donation->hour = $request->hour;

        if($request->add){
            $donation->remain = $donation->remain + $request->add;
            $donation->quota = $donation->quota + $request->add;
        }
        if($request->diff){
            $donation->remain = $donation->remain - $request->diff;
            $donation->quota = $donation->quota - $request->diff;
        }
        $donation->save();

        return redirect(route('donation.index'));
    }
    public function destroy(Donation $donation)
    {
        if($donation->heroes()->count()==0 && $donation->foods()->count()==0){
            $donation->delete();
        }
        return redirect(route('donation.index'));
    }
}

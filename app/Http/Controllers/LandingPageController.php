<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Client;
use App\Models\Company;
use App\Models\Contact;
use App\Models\FAQ;
use App\Models\Footer;
use App\Models\Portfolio;
use App\Models\Pricing;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Company::first();
        $service = Service::get();
        $pricing = Pricing::with('detail')->get();
        $category = Category::get();
        $portfolio = Portfolio::get();
        $testimoni = Testimoni::get();
        $team = Team::get();
        $client = Client::get();
        $blog = Blog::take(3)->get();
        $footer = Footer::first();
        $contact = Contact::first();
        $faq = FAQ::get();

        return view('pages.landingpage')->with([
            'items' => $items,
            'service' => $service,
            'pricing' => $pricing,
            'category' => $category,
            'portfolio' => $portfolio,
            'testimoni' => $testimoni,
            'team' => $team,
            'client' => $client,
            'blog' => $blog,
            'footer' => $footer,
            'contact' => $contact,
            'faq' => $faq,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function portfolio($id)
    {
        $items = Portfolio::findOrFail($id);
        return view('pages.portfolio')->with([
            'items' => $items
        ]);   
    }
}

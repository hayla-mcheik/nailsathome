<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use App\Models\About;
use App\Models\AboutImage;
use App\Models\BrochureService;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\Package;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontendController extends Controller
{
public function home()
{
    return Inertia::render('Frontend/Home', [
        'sliders'      => Slider::orderBy('sort_order')->get(),
        'about'        => About::first(),
        'aboutImages'  => AboutImage::orderBy('sort_order')->get(),
        // Fixed the line below: removed the double comma
'categories' => Category::with('services.variants')->orderBy('sort_order')->take(8)->get(),
        'testimonials' => Testimonial::latest()->get(),
        'gallery'      => Gallery::latest()->get(),
        'packages'     => Package::with('services')->latest()->take(3)->get(),
        'spaTreatments' => \App\Models\SpaTreatment::all(),
        'specialocsasion' => \App\Models\SpecialOccasion::all(),
    ]);
}

public function categoryServices($id)
{
    // Fetch the category with its services and their price variants
    $category = Category::with(['services.variants'])->findOrFail($id);

    return Inertia::render('Frontend/CategoryServices', [
        'category' => $category,
        // We pass all categories too if you want to show a sidebar/filter
        'allCategories' => Category::orderBy('sort_order')->get(), 
    ]);
}
public function treatyourself()
{
      return Inertia::render('Frontend/TreatYourself', [
                'spaTreatments' => \App\Models\SpaTreatment::all(),
                'spoilyourFeet' => \App\Models\SpoilYourFeet::all(),
                'brochureSections' => \App\Models\BrochureService::all()->groupBy('category_type')
        ]);
}

public function spoilyourfeet()
{
    return Inertia::render('Frontend/Spoil',[
         'spoilyourFeet' => \App\Models\SpoilYourFeet::all(),
    ]);
}

public function brands()
{
    return Inertia::render('Frontend/Brands',[
    'brands' => \App\Models\Brands::all(), 
    ]);
}

public function faq()
{
    return Inertia::render('Frontend/Faq',[
    'faq' => \App\Models\FAQ::all(),
    ]);
}


public function cantsayenough()
{
    return Inertia::render('Frontend/CanotSayEnough');
}
public function gorgeousnails() {
    return Inertia::render('Frontend/GorgeousNails', [
        'services' => BrochureService::where('category_type', 'nails')->get()
    ]);
}

public function leavemesoft() {
    return Inertia::render('Frontend/LeaveMeSoft', [
        'services' => BrochureService::where('category_type', 'waxing')->get()
    ]);
}

public function whatyouknead() {
    return Inertia::render('Frontend/WhatYouKnead', [
        'services' => BrochureService::where('category_type', 'massage')->get()
    ]);
}

public function hairathome()
{
    return Inertia::render('Frontend/HairAtHome', [
        // Grouping by category_group ensures the layout stays organized like the brochure
        'sections' => \App\Models\HairAtHome::all()->groupBy('category_group')
    ]);
}
public function turnbacktime()
{
    return Inertia::render('Frontend/TurnBackTime',[
    'turnbacktime' => \App\Models\TurnBackTime::all(),
    ]);
}

public function policy()
{
    return Inertia::render('Frontend/Policy', [
        'policies' => \App\Models\Policy::orderBy('sort_order')->get()
    ]);
}


    public function about()
    {
        return Inertia::render('Frontend/About', [
            'about'       => About::first(),
            'aboutImages' => AboutImage::all(),
        ]);
    }

    public function services()
    {

        return Inertia::render('Frontend/Services', [
         'categories' => Category::with('services.variants')->orderBy('sort_order')->get(),
        ]);
    }

    public function serviceshow($id)
    {
        $service = \App\Models\Service::with('variants', 'category')->findOrFail($id);
        return Inertia::render('Frontend/ServicesDetails', [
            'service' => $service
        ]);
    }

    public function transportationfees()
    {
        return Inertia::render('Frontend/TransportationFees',[
            'transportation' => \App\Models\TransportationArea::with('fee')
            ->orderBy('name', 'asc')
            ->get()
        ]);
    }
    public function contact()
    {
        return Inertia::render('Frontend/Contact');
    }
}

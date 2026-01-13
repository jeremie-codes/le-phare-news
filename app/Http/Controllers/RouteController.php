<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;
use App\Models\OpinionEtDecouverte;
use App\Models\Rubrique;
use App\Models\Annonce;
use App\Models\Article;
use App\Models\Banner;
use App\Models\BreakingNews;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Parametre;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class RouteController extends Controller
{

    public function index()
    {
        $lastvedettes = Article::where('type', 'vedettes')->with('comments')->latest()->limit(6)->get();
        $lastnews = Article::where('type', 'news')->latest()->limit(3)->get();
        $ads = Annonce::all();
        $banners = Banner::where('is_active', true)->latest()->get();
        $categories = Category::all();
        $configs = Parametre::all();
        $breakingNews = BreakingNews::where('is_active', true)->latest()->get();

        $sidenews = Article::where('type', 'news')->orderBy('created_at', 'asc')->limit(2)->get();
        $footerCategories = Category::all();
        $pubnumber = Parametre::where('type', 'numeropub')->first()->data ?? '';

        return view('home', compact('pubnumber', 'lastnews', 'lastvedettes', 'categories', 'footerCategories', 'ads', 'configs', 'sidenews', 'banners', 'breakingNews'));
    }

    public function news()
    {

        $news = Article::where('type', 'news')->paginate(10);
        $categories = Category::all();
        $configs = Parametre::all();

        $breakingNews = BreakingNews::where('is_active', true)->latest()->get();

        return view('news', compact('configs', 'news', 'categories', 'breakingNews'));
    }

    public function video()
    {

        $news = Article::where('type', 'video')->paginate(10);
        $categories = Category::all();
        $configs = Parametre::all();

        $breakingNews = BreakingNews::where('is_active', true)->latest()->get();

        return view('video', compact('configs', 'news', 'categories', 'breakingNews'));
    }

    public function show($id)
    {

        $news = Actualite::with('comments')->findOrFail($id);
        $breakingNews = BreakingNews::where('is_active', true)->latest()->get();
        $configs = Parametre::all();

        return view('shownews', compact('configs', 'article', 'breakingNews'));
    }

    public function contact()
    {

        $configs = Parametre::all();
        $breakingNews = BreakingNews::where('is_active', true)->latest()->get();

        return view('contact', compact('configs', 'breakingNews'));
    }

    // Ajouter un commentaire à l'actualité
    public function store(Request $request, $actualiteId)
    {
        $request->validate([
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email|max:255',
            'content' => 'required|string|max:500',
        ]);

        $actualite = Actualite::findOrFail($actualiteId);

        // Ajouter un commentaire à l'actualité
        $actualite->comments()->create([
            'nom' => $request->input('nom'),
            'email' => $request->input('email'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('actualites.show', $actualiteId)->with('success', 'Commentaire ajouté avec succès.');
    }

}

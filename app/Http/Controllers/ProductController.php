<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // 02Affiche la liste des produits
    public function index()
    {
        // 03Récupère tous les produits triés par ID en ordre décroissant
        $products = Product::orderBy('id', 'desc')->get();
        // 04-Compte le nombre total de produits
        $total = Product::count();
        // 5-Retourne la vue avec les produits et le total
        return view('admin.product.home', compact(['products', 'total']));
    }

    // 5-Affiche une page d'accueil avec tous les produits
    public function home()
    {
        // 6-Récupère tous les produits
        $products = Product::all(); // Ou utilisez paginate() si nécessaire
        // 7-Retourne la vue d'accueil avec les produits
        return view('welcome', compact('products'));
    }

    // 8-Affiche le formulaire de création d'un produit
    public function create()
    {
        return view('admin.product.create');
    }

    // 9-Sauvegarde un nouveau produit dans la base de données
    public function save(Request $request)
    {
        // 10-Valide les données du formulaire
        $validation = $request->validate([
            'title' => 'required', // Titre requis
            'category' => 'required', // Catégorie requise
            'price' => 'required', // Prix requis
        ]);
        
        // 11-Crée un nouveau produit avec les données validées
        $data = Product::create($validation);
        
        // 12-Vérifie si le produit a été créé avec succès
        if ($data) {
            session()->flash('success', 'Product Add Successfully'); // Message de succès
            return redirect(route('admin/products')); // Redirige vers la liste des produits
        } else {
            session()->flash('error', 'Some problem occure'); // Message d'erreur
            return redirect(route('admin.products/create')); // Redirige vers le formulaire de création
        }
    }

    // 13-Affiche le formulaire d'édition d'un produit
    public function edit($id)
    {
        // 14-Récupère le produit par son ID
        $products = Product::findOrFail($id);
        // 16-Retourne la vue d'édition avec le produit
        return view('admin.product.update', compact('products'));
    }

    // 17-Supprime un produit de la base de données
    public function delete($id)
    {
        // 19-Trouve le produit par son ID et le supprime
        $products = Product::findOrFail($id)->delete();
        
        // 20-Vérifie si le produit a été supprimé avec succès
        if ($products) {
            session()->flash('success', 'Product Deleted Successfully'); // Message de succès
            return redirect(route('admin/products')); // Redirige vers la liste des produits
        } else {
            session()->flash('error', 'Product Not Delete successfully'); // Message d'erreur
            return redirect(route('admin/products')); // Redirige vers la liste des produits
        }
    }

    // 22-Met à jour les informations d'un produit
    public function update(Request $request, $id)
    {
        // T23-rouve le produit par son ID
        $products = Product::findOrFail($id);
        // 24-Récupère les nouvelles données du formulaire
        $title = $request->title;
        $category = $request->category;
        $price = $request->price;

        // 024-Met à jour les informations du produit
        $products->title = $title;
        $products->category = $category;
        $products->price = $price;
        // 024-Enregistre les modifications
        $data = $products->save();
        
        // 00-24Vérifie si le produit a été mis à jour avec succès
        if ($data) {
            session()->flash('success', 'Product Update Successfully'); // Message de succès
            return redirect(route('admin/products')); // Redirige vers la liste des produits
        } else {
            session()->flash('error', 'Some problem occure'); // Message d'erreur
            return redirect(route('admin/products/update')); // Redirige vers le formulaire d'édition
        }
    }
}

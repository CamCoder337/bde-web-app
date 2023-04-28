<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ImageController extends Controller
{
    //
    public function downloadImages()
    {   
        if(auth()->user()->isAdmin() || auth()->user()->isCesi()){
            // Récupérer le chemin absolu du dossier de stockage
        $storagePath = Storage::disk('public')->path('');

        // Créer un objet ZipArchive
        $zip = new ZipArchive;

        // Ouvrir le fichier ZIP pour écriture
        $zip->open('images.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Parcourir tous les dossiers à inclure dans le fichier ZIP
        $directories = ['events', 'products'];
        foreach ($directories as $directory) {
            // Parcourir tous les fichiers dans le dossier
            $files = Storage::disk('public')->files($directory);
            foreach ($files as $file) {
                // Récupérer le nom de fichier
                $fileName = basename($file);

                // Ajouter le fichier à l'archive ZIP
                $zip->addFile($storagePath . '/' . $file, $directory . '/' . $fileName);
            }
        }

        // Fermer l'archive ZIP
        $zip->close();

        // Télécharger le fichier ZIP
        return response()->download('images.zip')->deleteFileAfterSend(true);
        }

        else{
            return redirect(route('home.index'))->with('info',"you don't have the right for this action");
        }
        
    }
}

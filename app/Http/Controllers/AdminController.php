<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {   
        $acceptedAdmin = User::where('is_admin', true)->get();
        $acceptedRevisor = User::where('is_revisor', true)->get();
        $acceptedWriter = User::where('is_writer', true)->get();

        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();

        return view('admin.dashboard', compact('acceptedAdmin', 'acceptedRevisor', 'acceptedWriter','adminRequests', 'revisorRequests', 'writerRequests'));
    }

    public function setAdmin(User $user)
    {
        $user->is_admin = true;
        $user->is_revisor = true;
        $user->is_writer = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('accept', "Hai reso $user->name Amministratore");
    }

    public function rejectSetAdmin(User $user)
    {
        $user->is_admin = false;
        $user->save();

        return redirect(route('admin.dashboard'))->with('reject', "Hai rifiutato il ruolo di Amministratore a $user->name ");
    }

    public function setRevisor(User $user)
    {
        $user->is_revisor = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('accept', "Hai reso $user->name Revisore");
    }

    public function rejectSetRevisor(User $user)
    {
        $user->is_admin = false;
        $user->save();

        return redirect(route('admin.dashboard'))->with('reject', "Hai rifiutato il ruolo di Revisore a $user->name ");
    }

    public function setWriter(User $user)
    {
        $user->is_writer = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('accept', "Hai reso $user->name Scrittore");
    }

    public function rejectSetWriter(User $user)
    {
        $user->is_admin = false;
        $user->save();

        return redirect(route('admin.dashboard'))->with('reject', "Hai rifiutato il ruolo di Redattore a $user->name ");
    }

    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Aggiorna il ruolo di un utente.
     *
     * @param User $user Utente di cui aggiornare il ruolo
     * @param Request $request Richiesta HTTP contenente il nuovo ruolo
     * @return \Illuminate\Http\RedirectResponse Reindirizza alla dashboard dell'admin con un messaggio di successo
     */
    /******  2aeaaeec-1afb-4c70-ac44-cee215560f06  *******/
    public function updateRole(User $user, Request $request)
    { 
        
        $role = $request->input('new_role');

        switch ($role) {
            case 'admin':
                $user->is_admin = true;
                $user->is_revisor = true;
                $user->is_writer = true;
                break;
            case 'revisor':
                $user->is_admin = false;
                $user->is_revisor = true;
                $user->is_writer = false;
                break;
            case 'writer':
                $user->is_admin = false;
                $user->is_revisor = false;
                $user->is_writer = true;
                break;
            case 'none':
                $user->is_admin = false;
                $user->is_revisor = false;
                $user->is_writer = false;
                break;
            default:
                return redirect()->back()->with('error', 'Ruolo non valido');
        }
        
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', "Ruolo di $user->name aggiornato");
    }

    public function editTag(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags',
        ]);

        $tag->update([
            'name' => strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('message', "Il tag $tag->name è stato aggiornato");
    }

    public function deleteTag(Tag $tag)
    {   
        foreach ($tag->articles as $article) {
            $article->tag()->detach($tag);
        }

        $tag->delete();
        return redirect(route('admin.dashboard'))->with('message', "Il tag è stato eliminato");
    }

    public function editCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        $category->update([
            'name' => strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('message', "La categoria $category->name è stata aggiornata");
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect(route('admin.dashboard'))->with('message', "La categoria è stata eliminata");
    }

    public function storeCategory(Request $request)
    {
        Category::create([
            'name' => strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('message', "Categoria inserita è stata creata");
    }
}

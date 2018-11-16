<?php
namespace App\Http\ViewComposer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use App\State;
class AuthStateViewComposer
{
    public function compose(View $view)
    {   $states = State::all();
        return $view->with([
            'states' => $states]);
        
    }
}
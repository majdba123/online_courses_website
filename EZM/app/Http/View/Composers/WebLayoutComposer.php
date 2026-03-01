<?php

namespace App\Http\View\Composers;

use App\Models\Web;
use Illuminate\View\View;

class WebLayoutComposer
{
    /**
     * Bind site settings to the view for web layout (header/footer).
     */
    public function compose(View $view): void
    {
        $view->with('site', Web::find(1));
    }
}

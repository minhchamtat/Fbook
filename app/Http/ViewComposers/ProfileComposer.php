<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Contracts\OptionRepository;
use App\Eloquent\Option;

class ProfileComposer
{

    /**
     * Create a new profile composer.
     *
     * @return  void
     */
    protected $option;

    public function __construct(OptionRepository $option)
    {
        $this->option = $option;
    }

    /**
     * Bind data to the view.
     *
     * @param    View  $view
     * @return  void
     */
    public function compose()
    {
        view()->share($this->option->setting());
    }
}

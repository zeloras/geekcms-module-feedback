<?php

namespace GeekCms\Feedback\Providers;

use GeekCms\PackagesManager\Support\ServiceProvider as MainServiceProvider;
use Illuminate\Support\Facades\Blade;

/**
 * Class InitServiceProvider.
 */
class InitServiceProvider extends MainServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function registerBladeDirective(): void
    {
        Blade::directive($this->name, function ($arguments) {
            $layout = str_replace(['(', ')', ' ', "'"], '', $arguments);
            $template = \View::make($this->name . '::' . $layout, ['content' => \ConfigManager::getSettings()])->render();
            return $template;
        });
    }
}

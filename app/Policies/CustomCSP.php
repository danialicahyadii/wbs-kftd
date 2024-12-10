<?php

namespace App\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class CustomCSP extends Basic
{
    public function configure()
    {
        parent::configure();

        $this
            ->addDirective(Directive::DEFAULT, ['https://www.youtube.com/', 'http://localhost:8000', 'https://unpkg.com'])
            ->addDirective(Directive::SCRIPT, ['https://www.google.com', 'https://unpkg.com', 'https://js.pusher.com', 'https://code.jquery.com', 'https://cdnjs.cloudflare.com'])

            ->addDirective(Directive::STYLE, [
                'https://fonts.googleapis.com',
                'https://fonts.gstatic.com',
                'https://cdn.jsdelivr.net',
                'https://unpkg.com',
                'http://localhost:8000'
            ])
            ->addDirective(Directive::FONT, 'https://fonts.gstatic.com')
            ->addDirective(Directive::IMG, ['https://kftd.co.id/', 'http://localhost:8000', 'https://unpkg.com', 'http://a.tile.openstreetmap.org','http://b.tile.openstreetmap.org', 'http://c.tile.openstreetmap.org', 'https://upload.wikimedia.org', 'https://i.pcmag.com'])
            ;
    }
}

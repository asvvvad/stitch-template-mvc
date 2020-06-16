<?php

/**
 * Controller for frontend routes
 */
class SiteController
{
    /**
     * The homepage
     *
     * @return array
     **/
    static public function home() : array
    {
        Stitch::$templates->addData([
            'title' => 'Stitch',
            'description' => 'Truely micro PHP framework to write less and enjoy more.',
            'header' => 'Stitch',
        ]);
        return ['view' => 'home'];
    }
}
